<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Dashboard extends Controller
{
    public function index()
    {
        $user = User::find(auth('user')->user()->id);
        $user->load('trades', 'deposits', 'withdrawals');
        $trades = $user->trades()->latest()->take(5)->get();
        $deposits = $user->deposits()->latest()->take(5)->get();
        $withdrawals = $user->withdrawals()->latest()->take(5)->get();
        return view(
            'user.index',
            compact(
                'user',
                'withdrawals',
                'deposits',
                'trades'
            )
        );
    }
}
