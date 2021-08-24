<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;

class TradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['active', 'inactive'])) $status = 'active';
        $q = Trade::query()->where('status', $status);
        $trades = $q->orderBy('created_at', 'desc')->paginate();
        return view('admin.trades.index', compact('trades'));
    }

    public function edit($id)
    {
        $trade = Trade::find($id);
        return view('admin.trades.edit', compact('trade'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'profit' => 'required|numeric',
        ]);
        $trade = Trade::find($id);
        $trade->profit = $request->profit;
        $trade->save();
        session()->flash('success', 'Update trade successfully');
        return redirect()->route('admin.trades.index', 'active');
    }

    public function end($id)
    {
        $trade = Trade::find($id);
        $user = $trade->user;
        $user->{'yes' == $trade->is_demo ? 'demo_balance' : 'balance'} += $trade->profit;
        $user->save();
        $trade->status = 'inactive';
        $trade->save();
        session()->flash('success','Trade ended');
        return redirect()->route('admin.trades.index', 'active');
    }
}
