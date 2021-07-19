<?php

function base_domain($path = '')
{
    return config('domain.base').$path;
}

function user_domain($path = '')
{
    return config('domain.user').$path;
}

function admin_domain($path = '')
{
    return config('domain.admin').$path;
}

function logo()
{
    return asset(config('dir.logo'));
}
