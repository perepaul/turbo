<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositApprovedMailable;
use App\Mail\DepositDeclinedMailable;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['pending', 'approved', 'declined'])) $status = 'approved';
        $q = Deposit::query()->where('status', $status);
        $deposits = $q->orderBy('created_at', 'desc')->paginate();
        return view('admin.deposits.index', compact('deposits'));
    }

    public function approve($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'approved';
        $amount = $deposit->amount + $deposit->user->amount;
        $deposit->user()->update(['balance' => $amount]);
        $deposit->save();
        Mail::to($deposit->user)->send(new DepositApprovedMailable($deposit));
        session()->flash('success', 'Approved Successfully');
        return back();
    }

    public function decline($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'declined';
        $deposit->save();
        Mail::to($deposit->user)->send(new DepositDeclinedMailable($deposit));
        session()->flash('success', 'Approved Successfully');
        return back();
    }
}
