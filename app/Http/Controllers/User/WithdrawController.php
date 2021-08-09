<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    public function index()
    {
        $methods = Method::all();
        return view('user.withdrawal.deposit', compact('methods'));
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

        $user = User::find(auth()->user()->id);
        $amount = (5 / 100) * $request->amount + $request->amount;
        if($user->balance < $amount) {
            session()->flash('error','Insufficient funds');
            return redirect()->back()->withInput();
        }
        $user->withdrawals()->create([
            'method_id' => $request->input('method'),
            'amount' => $request->amount,
            'reference' => generateReference(Deposit::class),
            'address' => $request->address,
        ]);
        session()->flash('success', 'Withdrawal initiated successfully');
        return redirect()->back();
    }
}
