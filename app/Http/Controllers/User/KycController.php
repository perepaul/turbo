<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KycController extends Controller
{
    function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('user.kyc.index', compact('user'));
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'trading_licence' => 'required|mimes:png,jpg,jpeg,pdf',
        ]);
        $file = $request->file('trading_licence');
        $filename = Str::random(5) . now()->timestamp . '.' . $file->extension();
        $file->move(public_path('uploads/certs/'), $filename);
        $user = User::findOrFail($id);
        $user->cert = $filename;
        $user->trade_cert = 'uploaded';
        $user->save();
        return back()->with('message', 'Trading license sumbmited');
    }
}
