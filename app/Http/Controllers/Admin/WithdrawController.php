<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalAcceptedMailable;
use App\Mail\WithdrawalDeclinedMailable;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['pending', 'approved', 'declined'])) $status = 'approved';
        // dd(Withdrawal::where('status','pending')->get());
        $q = Withdrawal::query()->where('status', $status);
        $withdrawals = $q->orderBy('created_at', 'desc')->paginate();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();
        // $withdrawal->user()->update(['balance' => $withdrawal->user->balance - $withdrawal->amount]);
        Mail::to($withdrawal->user)->send(new WithdrawalAcceptedMailable($withdrawal));
        session()->flash('success', 'Withdrawal accepted');
        return back();
    }

    public function decline($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'declined';
        $withdrawal->save();
        $withdrawal->user()->update(['balance' => $withdrawal->user->balance + $withdrawal->amount]);
        Mail::to($withdrawal->user)->send(new WithdrawalDeclinedMailable($withdrawal));
        session()->flash('success', 'Withdrawal accepted');
        return back();
    }
}
