<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Http\Request;
use App\Models\TradeCurrency;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TradeController extends Controller
{

    public function index()
    {
        $currencies = TradeCurrency::all();
        $user = User::find(auth('user')->user()->id);
        $trades = $user->trades()->latest()->paginate();
        return view('user.trade.index', compact('user', 'currencies', 'trades'));
    }

    public function trade(Request $request)
    {
        $valid = $request->validate([
            'payment_method' => 'required',
            'currency' => 'required',
            'amount' => 'required|numeric',
            'time' => 'required|string'
        ]);
        $user = User::find(auth('user')->user()->id);
        if (in_array($user->trade_cert, ['require', 'uploaded'])) {
            return back()->withInput()->with('error', 'Your account is currently inactive as we have requested for your trading licence, your account will be activated when it is verified. ');
        }

        if ($user->trade_mode == 'automatic') {
            return back()->withInput()->with('error', 'You can\’t trade as you have an automated trading EA linked to your account');
        }

        $amount = $request->amount;
        if ($user->{$request->payment_method} < $amount) {
            session()->flash('error', 'Insufficient Funds');
            return redirect()->back()->withInput();
        }
        $user->{$request->payment_method} -= $amount;
        $user->trades()->create([
            'trade_currency_id' => $request->currency,
            'amount' => $request->amount,
            'is_demo' => 'no',
            'reference' => generateReference(),
            'profit' => 0,
            'type' => strtolower($request->type),
            'time' => $request->time
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
        if ($user->trade_mode == 'automatic') {
            return back()->withInput()->with('error', 'You can\’t trade as you have an automated trading EA linked to your account');
        }
        if (in_array($user->trade_cert, ['require', 'uploaded'])) {
            return back()->withInput()->with('error', 'Your account is currently inactive as we have requested for your trading licence, your account will be activated when it is verified. ');
        }
        $trade->close();
        session()->flash('success', 'Trade Closed');
        return redirect()->back();
    }
}
