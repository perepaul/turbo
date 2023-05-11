<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Method;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Mail\TradeCertMailable;
use App\Events\Account\Declined;
use App\Events\Account\Activated;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerifiedMailable;
use App\Models\Withdrawal;
use Illuminate\Support\Carbon as SupportCarbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['active', 'inactive', 'pending', 'rejected'])) $status = 'active';
        $q = User::query()->where('status', $status);
        $users = $q->orderBy('created_at', 'desc')->paginate();
        return view('admin.users.index', compact('users'));
    }


    public function loginAs($id)
    {
        $user = User::find($id);
        if (!$user) abort(404);
        $loggedin = Auth::guard('user')->loginUsingId($id);

        if ($loggedin) return redirect()->route('user.index');
        return redirect()->route('admin.index');
    }

    public function status(Request $request, $id)
    {
        if (!in_array($request->status, ['active', 'pending', 'inactive', 'rejected'])) {
            session()->flash('error', 'Invalid status type');
            return back();
        }
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();
        $this->sendStatusNotification($user);
        session('success', 'Status updated successfully');
        return back();
    }

    private function sendStatusNotification(User $user)
    {
        if ($user->status == 'active') {
            event(new Activated($user));
        } elseif ($user->status == 'rejected') {
            event(new Declined($user));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|regex:/^[+][0-9]{9,14}/',
            'trading_balance' => 'nullable|numeric',
            'trade_mode' => 'required|in:automatic,manual,dual',
            'demo_balance' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'invested_balance' => 'nullable|numeric',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        $user = User::find($id);
        $user->update($valid);
        session()->flash('success', 'User Updated');
        return redirect()->route('admin.users.index', 'acitve');
    }

    function tradeCert(int $id)
    {
        $user = User::findOrFail($id);
        $user->trade_cert = 'require';
        $user->save();
        session()->flash('success', 'requested for user trading certificate');
        Mail::to($user)->send(new TradeCertMailable());
        return back();
    }

    function verifyTradeCert($id)
    {
        $user = User::findOrFail($id);
        $user->trade_cert = 'verified';
        $user->save();
        return back()->with('message', 'Trade certificate submitted');
    }

    // public function addOrRemoveFundsView($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.users.add-or-remove-funds', compact('user'));
    // }

    // public function addOrRemoveFunds(Request $request, $id)
    // {
    //     $request->validate([
    //         'action' => ['required', 'string', 'in:add,remove'],
    //         'account' => ['required', 'string', 'in:balance,referral_balance'],
    //         'amount' => ['required', 'numberic'],
    //         'date' => ['required', 'string']
    //     ]);

    //     $user = User::findOrFail($id);

    //     try {
    //         $created_at = Carbon::createFromTimeString($request->input('date'));
    //         if ($request->input('action') == 'add') {
    //             $user->increment($request->input('account'), $request->input('amount'));
    //         } else {
    //             $user->decrement($request->input('account'), $request->input('amount'));
    //         }
    //         $user->update([])
    //     } catch (\Throwable $th) {
    //         report($th);
    //         return back();
    //     }
    // }


    public function addDepositView($id)
    {
        $user = User::findOrFail($id);
        $methods = Method::where('is_bank', 0)->where('status', 'active')->get();
        return view('admin.users.add-deposit', compact('user', 'methods'));
    }

    public function addDeposit(Request $request, $id)
    {
        $request->validate([
            'method' => ['required', 'exists:methods,id'],
            'amount' => ['required', 'numeric'],
            'proof' => ['required', 'mimes:png,jpg,jpeg'],
            'date' => ['required', 'string'],
            'status' => ['required', 'in:pending,approved,declined']
        ]);

        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $created_at = SupportCarbon::createFromTimeString($request->input('date'));
            $filename = rand() . now()->toDateTimeString() . '.' . $request->file('proof')->extension();
            $request->file('proof')->move(public_path(config('dir.deposits')), $filename);
            $deposit = $user->deposits()->create([
                'method_id' => $request->input('method'),
                'amount' => $request->amount,
                'proof' => $filename,
                'reference' => generateReference(Deposit::class),
                'type' => $request->input('status'),
                'created_at' => $created_at
            ]);
            DB::commit();
            session()->flash('success', 'Deposited successfully, waiting for approvals');
            return back();
        } catch (\Throwable $th) {
            report($th);
            DB::rollBack();
            session()->flash('error', 'Failed to process deposit request');
        }
    }

    public function addWithdrawalView($id)
    {
        $user = User::findOrFail($id);
        $methods = $user->methods()->with('method')->get();
        return view('admin.users.add-withdrawal', compact('user', 'methods'));
    }

    public function addWithdrawal(Request $request, $id)
    {
        $request->validate([
            'method' => ['required'],
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'string'],
            'status' => ['required', 'in:pending,approved,declined']
        ]);

        DB::beginTransaction();
        try {
            $created_at = SupportCarbon::createFromTimeString($request->input('date'));
            $user = User::findOrFail($id);

            $method = $user->methods()->whereId($request->input('method'))->first();
            $withdrawal = $user->withdrawals()->create([
                'method_id' => $method->id,
                'amount' => $request->amount,
                'reference' => generateReference(Withdrawal::class),
                'address' => $method->address,
                'created_at' => $created_at
            ]);
            DB::commit();
            session()->flash('success', 'Withdrawal initiated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Failed to initiate withdrawal');
            report($th);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->emails()->delete();
        $user->withdrawals()->delete();
        $user->trades()->delete();
        $user->deposits()->delete();
        $user->delete();
        return back()->with('success', 'User Deleted');
    }
}
