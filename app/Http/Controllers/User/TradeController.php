<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Http\Request;
use App\Models\TradeCurrency;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{

    public function index()
    {
        $currencies = TradeCurrency::all();
        return view('user.trade.index', compact('currencies'));
    }

    public function trade(Request $request)
    {
        $valid = $request->validate([
            'payment_method' => 'required',
            'currency' => 'required',
            'amount' => 'required|numeric',
        ]);
        $user = User::find(auth('user')->user()->id);
        $amount = ((5 / 100) * $request->amount) + $request->amount;
        if ($user->{$request->payment_method} < $amount) {
            session()->flash(['error', 'Insufficient Funds']);
            return redirect()->back()->withInput();
        }
        $user->{$request->payment_method} -= $amount;
        $user->trades()->create([
            'trade_currency_id' => $request->currency,
            'amount' => $request->amount,
            'is_demo' => $request->payment_method == 'demo_balance' ? 'yes' : 'no',
            'reference' => generateReference(),
            'profit' => 0,
            'type' => strtolower($request->type)
        ]);
        $user->save();
        session()->flash('success', 'Trade created successfully');
        return redirect()->back();
    }

    public function market()
    {
        return view('user.trade.market');
    }

    public function history()
    {
        $user = User::find(auth('user')->user()->id);
        $trades = $user->trades()->orderBy('created_at', 'desc')->paginate();
        return view('user.trade.history', compact('trades'));
    }

    public function end($id)
    {
        $trade = Trade::find($id);
        $user = $trade->user;
        $user->{'yes' == $trade->is_demo ? 'demo_balance' : 'trading_balance'} += $trade->profit;
        $user->save();
        $trade->status = 'inactive';
        $trade->save();
        session()->flash('success','Trade Closed');
        return redirect()->back();
    }
}
