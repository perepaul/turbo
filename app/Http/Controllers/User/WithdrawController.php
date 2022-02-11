<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Contact;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewWithdrawalMailable;
use App\Mail\WithdrawalInitiatedMailable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    public function index()
    {
        $methods = Method::all();
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
            'address' => 'required|string',
        ]);

        try {
            $user = User::find(auth()->user()->id);
            $amount = $request->amount;
            if ($user->balance < $amount) {
                session()->flash('error', 'Insufficient funds');
                return redirect()->back()->withInput();
            }
            $user->balance -= $amount;
            $user->save();
            $withdrawal = $user->withdrawals()->create([
                'method_id' => $request->input('method'),
                'amount' => $request->amount,
                'reference' => generateReference(Deposit::class),
                'address' => $request->address,
            ]);
            $contact = Contact::find(1);
            if (!is_null($contact) && !empty($contact->notification_email)) {
                Mail::to($contact->notification_email)->send(new NewWithdrawalMailable($withdrawal));
            }
            Mail::to($user)->send(new WithdrawalInitiatedMailable($withdrawal));
            session()->flash('success', 'Withdrawal initiated successfully');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to initiate withdrawal');
        }
        return redirect()->back();
    }
}
