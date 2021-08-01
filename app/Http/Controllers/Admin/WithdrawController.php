<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['pending', 'approved','declined'])) $status = 'approved';
        // dd(Withdrawal::where('status','pending')->get());
        $q = Withdrawal::query()->where('status', $status);
        $withdrawals = $q->orderBy('created_at', 'desc')->paginate(1);
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();
        session()->flash('success','Withdrawal accepted');
        return back();
    }

    public function decline($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = 'declined';
        $withdrawal->save();
        session()->flash('success','Withdrawal accepted');
        return back();
    }
}
