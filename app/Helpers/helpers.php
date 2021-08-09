<?php

use App\Models\Trade;
use Illuminate\Support\Str;

function base_domain($path = '')
{
    return config('domain.base') . $path;
}

function user_domain($path = '')
{
    return config('domain.user') . $path;
}

function admin_domain($path = '')
{
    return config('domain.admin') . $path;
}

function logo()
{
    return asset(config('dir.logo'));
}

function favicon()
{
    return asset(config('dir.favicon'));
}

function format_money($amount, $symbol = '$')
{
    $s = auth('user')->user()->currency->symbol ?? '$';

    return $s . number_format($amount, 2);
}
function random_string($length = 10)
{
    // ABCDEFGHJKMNOPQRSTUVWXYZ
    $characters = 'abcdefghijklmnopqrstuvwxyz123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 12; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return Str::limit($randomString, $length, '');
}

function generateReference($model = Trade::class)
{
    $reference = random_string();
    while ($model::where('reference', $reference)->exists()) {
        $reference = random_string();
    }
    return $reference;
}

function profile_picture($image = null)
{
    $picture = 'default.png';
    if (auth('user')->user() && request()->isUser()) $picture = auth('user')->user()->profile;
    if(!is_null($image)) $picture = $image;

    if(empty($picture) || is_null($picture)) $picture = 'default.png';
    return asset(config('dir.profile') . $picture);
}
