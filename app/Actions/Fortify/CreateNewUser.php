<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use App\Events\Account\Created;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        Validator::make($input, [
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
        ])->validate();
        $user = session()->pull('user');
        $user = User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'referral_code' => $this->generateReferralCode(),
            'password' => Hash::make($input['password']),
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
