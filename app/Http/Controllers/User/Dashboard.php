<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $user = User::find(auth('user')->user()->id);
        $user->load('trades','deposits','withdrawals');
        return view('user.index',compact('user'));
    }
}
