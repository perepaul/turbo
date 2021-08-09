<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function subscriptions()
    {
        $subscriptions = Plan::all();
        return view('user.subscriptions',compact('subscriptions'));
    }

    public function subscribe($id)
    {
        $user = User::find(auth('user')->user()->id);
        $plan = Plan::findOrFail($id);
        $user->plan_id = $id;
        $user->save();
        session()->flash('subscribed to '.$plan->name);
        return redirect()->route('user.index');
    }
}
