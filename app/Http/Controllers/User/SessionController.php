<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function sessions()
    {
        return view('user.sessions', ['user' => User::findOrFail(auth()->user()->id)->load('devices')]);
    }

    public function logout(Request $request, $device_id)
    {
        $user = User::findOrFail(auth()->user()->id);
        $device = Device::find($device_id);

        if ($device && Hash::check($request->input('password'), $user->password)) {
            Log::info("session id: $device->session_id");
            Session::setId($device->session_id);
            Session::invalidate();
        } else {
            session()->flash('error', 'The entered password is incorrect');
            return back();
        }
        session()->flash('success', "Logged out of $device->name.");
        return back();
    }

    public function logoutOtherDevices(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $devices = $user->devices;
        Auth::logoutOtherDevices($request->password);
        foreach ($devices as $device) {
            if (!$device->isActive()) {
                $device->delete();
            }
        }
        return back()->with('message', 'Logged out of other devices successfully');
    }
}
