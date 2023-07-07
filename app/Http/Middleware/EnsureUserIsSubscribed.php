<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user  = $request->user('user');
        $allowed = [
            'user.subscriptions',
            'user.subscriptions.subscribe',
            'user.deposit.index',
            'user.deposit.create',
            'user.deposit.history'
        ];
        if (in_array($request->route()->getName(), $allowed)) {
            return $next($request);
        }
        if (is_null($user->plan_id)) {
            return redirect()->route('user.subscriptions');
        }
        return $next($request);
    }
}
