<?php

namespace App\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : $this->go();
    }

    private function go()
    {
        $url = request()->isAdmin() ? redirect()->route('admin.index') : redirect()->route('user.index');
        return redirect()->intended($url);
    }
}
