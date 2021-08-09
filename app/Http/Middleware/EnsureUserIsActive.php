<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsActive
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
        $user = $request->user('user');
        if ($user->statusIs('active')) return $next($request);

        if ($user->statusIs('pending')) {
            if (is_null($user->country) || is_null($user->zip_code)) {
                return redirect()->route('user.activation.step.one');
            } else if (is_null($user->currency_id) || is_null($user->profile)) {
                return redirect()->route('user.activation.step.two');
            } else {
                return redirect()->route('user.activation.complete');
            }
        }
    }
}
