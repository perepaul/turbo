<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Method;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DepositInitiatedMailable;
use App\Mail\NewDepositMailable;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

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
        $deposit = $user->deposits()->create([
            'method_id' => $request->input('method'),
            'amount' => $request->amount,
            'proof' => $filename,
            'reference' => generateReference(Deposit::class),
        ]);
        $contact = Contact::find(1);
        if(!is_null($contact->notification_email)){
            Mail::to($contact->notification_email)->send(new NewDepositMailable($deposit));
        }
        Mail::to($user)->send(new DepositInitiatedMailable($deposit));
        session()->flash('success','Deposited successfully, waiting for approvals');
        return redirect()->back();

    }
}
