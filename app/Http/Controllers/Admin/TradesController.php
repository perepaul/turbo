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
        $trades = $q->latest()->paginate();
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
        Trade::find($id)->close();
        session()->flash('success', 'Trade ended');
        return redirect()->route('admin.trades.index', 'active');
    }
}
