<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectAuthRoutes
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
        // dd($request->getScheme() . '://' . base_domain() . '/register' == url()->cur);
        $routes = ['/login', '/register'];
        foreach ($routes as $route) {
            if (url()->current() == $request->getScheme() . '://' . base_domain() . $route) return redirect()->to(request()->getScheme() . '://' . user_domain() . $route);
        }
        return $next($request);
    }
}
