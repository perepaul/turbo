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
        if (url()->current() == route('user.subscriptions') || $request->route()->getName() == 'user.subscriptions.subscribe') {
            return $next($request);
        }
        if (is_null($user->plan_id)) {
            return redirect()->route('user.subscriptions');
        }
        return $next($request);
    }
}
