<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Contact;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\NewWithdrawalMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\WithdrawalInitiatedMailable;

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

        DB::beginTransaction();
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
            DB::commit();
            session()->flash('success', 'Withdrawal initiated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Failed to initiate withdrawal');
        }
        return redirect()->back();
    }
}
