<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.settings.profile');
    }

    public function securityPage()
    {
        return view('admin.settings.security');
    }

    public function securityUpdate(Request $request)
    {
        $valid = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'sometimes|nullable|string|confirmed'
        ]);
        $admin = Admin::find(auth('admin')->user()->id);
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        if($valid['password']){
            $admin->password =  $request->password;
        }
        $admin->save();
        session()->flash('success','Updated Successfully');
        return redirect()->back();
    }
}
