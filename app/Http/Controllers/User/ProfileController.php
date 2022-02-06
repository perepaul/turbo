<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $currencies = Currency::all();
        $user = User::find(auth('user')->user()->id);
        return view('user.profile', compact('user', 'currencies'));
    }

    public function updateProfile(Request $request)
    {
        $valid = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
        ]);
        $user = User::find(auth('user')->user()->id);

        $user->update($valid);
        session()->flash('success', 'Profile updated successfully');
        return redirect()->back();
    }

    public function security()
    {
        return view('user.security');
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(auth('user')->user()->id);
        if (!Hash::check($request->current_password, $user->password)) {
            session()->flash('error', 'Invalid current password');
            return redirect()->back()->withInput();
        }

        if (Hash::check($request->password, $user->password)) {
            session()->flash('error', 'Old password detected');
            return redirect()->back()->withInput();
        }
        $user->password = $request->password;
        $user->save();
        session()->flash('success', 'Password changed successfully');
    }

    public function preference()
    {
        $currencies = Currency::all();
        return view('user.preference', compact('currencies'));
    }

    public function preferenceSecurity(Request $request)
    {
        $request->validate([
            'prefered_account_currency' => 'required|integer',
        ]);

        if (!Currency::where('id', $request->prefered_account_currency)->exists()) {
            session()->flash('error', 'Invalid or Unkown account currency');
            return redirect()->back()->withInput();
        }

        $user = User::find(auth('user')->user()->id);
        $user->currency_id = $request->prefered_account_currency;
        session()->flash('success', 'Preferences updated');
        return redirect()->back();
    }
}
