<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TradeCurrency;
use Illuminate\Http\Request;

class TradeCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = TradeCurrency::orderBy('id', 'desc')->get();
        return view('admin.trade-currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trade-currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|unique:trade_currencies'
        ]);
        $currency = new TradeCurrency();
        $currency->name = $request->name;
        $currency->save();
        session()->flash('success','Created successfully');
        return redirect()->route('admin.trade-currency.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradeCurrency  $tradeCurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(TradeCurrency $tradeCurrency)
    {
        return view('admin.trade-currency.edit',['currency' => $tradeCurrency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TradeCurrency  $tradeCurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TradeCurrency $tradeCurrency)
    {
        $request->validate([
            'name' => 'required|unique:trade_currencies,name,'.$tradeCurrency->id,
        ]);
        $tradeCurrency->name = $request->name;
        $tradeCurrency->save();
        session()->flash('success','Updated successfully');
        return redirect()->route('admin.trade-currency.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradeCurrency  $tradeCurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradeCurrency $tradeCurrency)
    {
        if ($tradeCurrency->trade()->count()) {
            session()->flash('error', 'Cannot delete, because the currncy is attached to one or more trades.');
            return back();
        }
        $tradeCurrency->delete();
        session()->flash('success','Updated successfully');
        return redirect()->route('admin.trade-currency.index');
    }
}
