<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    public function index()
    {
        $methods = Method::all();
        return view('user.deposit.deposit', compact('methods'));
    }

    public function history()
    {
        $user = User::find(auth()->user()->id);
        $deposits = $user->deposits()->orderBy('created_at', 'desc')->paginate();
        return view('user.deposit.history', compact('deposits'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'amount' => 'required|numeric',
            'proof' => 'mimes:png,jpg,jpeg',
        ]);

        $user = User::find(auth()->user()->id);
        $filename = rand() . now()->toDateTimeString() . '.' . $request->file('proof')->extension();
        $request->file('proof')->move(public_path(config('dir.deposits')),$filename);
        $user->deposits()->create([
            'method_id' => $request->input('method'),
            'amount' => $request->amount,
            'proof' => $filename,
            'reference' => generateReference(Deposit::class),
        ]);
        session()->flash('success','Deposited successfully');
        return redirect()->back();

    }
}
