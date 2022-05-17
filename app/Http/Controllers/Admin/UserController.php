<?php

namespace App\Http\Controllers\Admin;

use App\Events\Account\Activated;
use App\Events\Account\Declined;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerifiedMailable;
use App\Mail\TradeCertMailable;

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
