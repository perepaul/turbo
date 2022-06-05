<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Contact;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\NewWithdrawalMailable;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\WithdrawalInitiatedMailable;
use App\Models\WithdrawalMethod;

class WithdrawController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $methods = $user->methods()->with('method')->get();
        return view('user.withdrawal.withdraw', compact('methods'));
    }

    public function history()
    {
        $user = User::find(auth()->user()->id);
        $withdrawals = $user->withdrawals()->orderBy('created_at', 'desc')->paginate();
        return view('user.withdrawal.history', compact('withdrawals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'amount' => 'required|numeric',
        ]);
        $user = User::find(auth()->user()->id);

        $method = $user->methods()->whereId($request->input('method'))->first();

        if (in_array($user->trade_cert, ['require', 'uploaded'])) {
            return back()->withInput()->with('error', 'Your account is currently inactive as we have requested for your trading licence, your account will be activated when it is verified. ');
        }

        DB::beginTransaction();
        try {
            $amount = $request->amount;
            if ($user->balance < $amount) {
                session()->flash('error', 'Insufficient funds');
                return redirect()->back()->withInput();
            }
            $user->balance -= $amount;
            $user->save();

            $withdrawal = $user->withdrawals()->create([
                'method_id' => $method->id,
                'amount' => $request->amount,
                'reference' => generateReference(Deposit::class),
                'address' => $method->address,
            ]);
            $contact = Contact::find(1);
            if (!is_null($contact) && !empty($contact->notification_email)) {
                Mail::to($contact->notification_email)->send(new NewWithdrawalMailable($withdrawal));
            }
            Mail::to($user)->send(new WithdrawalInitiatedMailable($withdrawal, $contact));
            DB::commit();
            session()->flash('success', 'Withdrawal initiated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Failed to initiate withdrawal');
            Log::error("$th->getMessage() file: $th->getFile() on line: $th->getLine()");
        }
        return redirect()->back();
    }
}
