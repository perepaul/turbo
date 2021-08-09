<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status)
    {
        if (!in_array($status, ['active', 'inactive', 'pending','rejected'])) $status = 'active';
        $q = User::query()->where('status', $status);
        $users = $q->orderBy('created_at', 'desc')->paginate(1);
        return view('admin.users.index', compact('users'));
    }


    public function loginAs($id)
    {
        $user = User::find($id);
        if (!$user) abort(404);
        auth('user')->loginUsingId($id,true);
        return redirect()->route('user.index');
    }

    public function status(Request $request,$id)
    {
        if(!in_array($request->status,['active','pending','inactive','rejected'])){
            session()->flash('error','Invalid status type');
            return back();
        }
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();
        session('success','Status updated successfully');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|regex:/^[+][0-9]{9,14}/',
            'trading_balance' => 'nullable|numeric',
            'demo_balance' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        $user = User::find($id);
        $user->update($valid);
        session()->flash('success','User Updated');
        return redirect()->route('admin.users.index','acitve');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
