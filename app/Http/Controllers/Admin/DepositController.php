<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['pending', 'approved','declined'])) $status = 'approved';
        $q = Deposit::query()->where('status', $status);
        $deposits = $q->orderBy('created_at', 'desc')->paginate();
        return view('admin.deposits.index', compact('deposits'));
    }

    public function approve($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'approved';
        $deposit->save();
        session()->flash('success','Approved Successfully');
        return back();
    }

    public function declined($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 'declined';
        $deposit->save();
        session()->flash('success','Approved Successfully');
        return back();
    }
}
