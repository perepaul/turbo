<?php

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
