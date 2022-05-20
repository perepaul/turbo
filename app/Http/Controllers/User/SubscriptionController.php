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
        return view('user.subscriptions', compact('subscriptions'));
    }

    public function subscribe($id)
    {
        $user = User::find(auth('user')->user()->id);
        if (in_array($user->trade_cert, ['require', 'uploaded'])) {
            return back()->withInput()->with('error', 'Your account is currently inactive as we have requested for your trading licence, your account will be activated when it is verified. ');
        }
        $plan = Plan::findOrFail($id);
        if (empty($user->plan_expires_at)) {
            $referred_user = User::find($user->referral_id);
            // dd($referred_user);
            if (!is_null($referred_user)) {
                $commission = ($plan->referral_commission / 100) * $plan->amount;
                $referred_user->referral_balance += $commission;
                $referred_user->save();
            }
        }
        if ($plan->amount > $user->balance) {
            return redirect()
                ->route('user.deposit.index')
                ->with('error', "Insufficient funds, you need to have a balance of {$user->currency->symbol}{$plan->amount} to continue.");
        }

        $user->balance -= $plan->amount;
        $user->invested_balance += $plan->amount;
        $user->plan_id = $id;
        $user->plan_expires_at = now()->addDays($plan->trade_tenure)->timestamp;
        $user->save();
        session()->flash('success', 'subscribed to ' . $plan->name);
        return redirect()->route('user.index');
    }
}
