<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Trade;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $deposits = Deposit::latest()->get();
        $withdrawals = Withdrawal::latest()->get();
        $trades = Trade::all();
        return view('admin.index', compact('users', 'deposits', 'withdrawals', 'trades'));
    }
}
