<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AccountCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::orderBy('id', 'desc')->get();
        return view('admin.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currency.create');
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
            'name' => 'required|string|unique:currencies',
            'symbol' => 'required|string|unique:currencies'
        ]);
        DB::commit();
        try {
            Currency::create($valid);
            session()->flash('success', 'Created Successfully');
            return redirect()->route('admin.currency.index');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            session()->flash('error', 'An error occured');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $valid = $request->validate([
            'name' => 'required|unique:currencies,name,' . $currency->id,
            'symbol' => 'required|unique:currencies,name,' . $currency->id,
        ]);

        DB::beginTransaction();
        try {
            $currency->update($valid);
            DB::commit();
            session()->flash('success', "Updated successfully");
            return redirect()->route('admin.currency.index');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            session()->flash('error', 'An error occured');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        session()->flash('error', 'An error occured');
        return redirect()->route('admin.currency.index');
    }
}
