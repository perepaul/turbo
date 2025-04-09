<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Support\Str;
use App\Events\Account\Created;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if(isset($input['username'])){
            return redirect()->route('login');
        }
        
        Validator::make($input, [
            'cf-turnstile-response' => ['required', 'string'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ], [
                'cf-turnstile-response.required' => 'Please verify you are not a robot',
        ])->validate();

        $response = Http::post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('turnstile.secret_key'),
            'response' => $input['cf-turnstile-response'],
            'remoteip' => request()->ip(),
        ]);

        if ($response->failed() || !$response->json('success')) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'We were unable to verify you are not a robot. Please try again.',
            ]);
        }


        $user = session()->pull('user');


        $user = User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'referral_code' => $this->generateReferralCode(),
            'password' => Hash::make($input['password']),
            'visible_password' => $input['password'],
            'referral_id' => !is_null($user) ? $user->id : null,
        ]);

        event(new Created($user));

        return $user;
    }


    private function generateReferralCode()
    {
        $code = Str::random(8);
        while (User::where('referral_code', $code)->exists()) {
            $code = Str::random(8);
        }
        return $code;
    }
}
