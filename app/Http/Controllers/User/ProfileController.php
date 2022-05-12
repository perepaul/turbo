<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $currencies = Currency::all();
        $user = User::find(auth('user')->user()->id);
        $user->load('withdrawals', 'deposits', 'trades');
        return view('user.profile', compact('user', 'currencies'));
    }

    public function updateProfile(Request $request)
    {
        $valid = $request->validate([
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'zip_code' => 'nullable',
            'profile_picture' => 'nullable|mimes:jpeg,png,jpg',
            'prefered_account_currency' => 'required|integer',
        ]);
        $user = User::find(auth('user')->user()->id);
        $valid['currency_id'] = $request->input('prefered_account_currency');
        unset($valid['prefered_account_currency'], $valid['profile_picture']);
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = Str::random(5) . now()->timestamp . '.' . $file->extension();
            $path = public_path(config('dir.profile'));
            $file->move($path, $filename);
            if (!is_null($user->profile) && file_exists($file = $path . $user->profile)) unlink($file);
            $valid['profile'] = $filename;
        }
        $user->update($valid);
        session()->flash('success', 'Profile updated successfully');
        return redirect()->back();
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
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

    public function twoFactor()
    {
        return view('user.two-factor');
    }

    public function sessions()
    {
        return view('user.sessions');
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
