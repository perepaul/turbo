<?php

namespace App\Extensions;

use Illuminate\Contracts\Auth\Guard;
use \hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Session\DatabaseSessionHandler as BaseDatabaseSessionHandler;

class DatabaseSessionHandler extends BaseDatabaseSessionHandler
{
    protected function userId()
    {
        return $this->container->make(Guard::class)->user()?->id;
    }

    protected function userType()
    {
        $user = $this->container->make(Guard::class)->user();
        if (is_null($user)) return $user;

        return get_class($user);
    }

    protected function addUserInformation(&$payload)
    {
        $request = $this->container->make('request');
        $ipinfo = $request->ipinfo;
        if ($this->container->bound(Guard::class)) {
            $payload['sessionable_id'] = $this->userId();
            $payload['sessionable_type'] = $this->userType();
        }

        if ($ipinfo->all) {
            $payload['country'] = $ipinfo->country_name;
            $payload['region'] = $ipinfo->region;
            $payload['city'] = $ipinfo->city;
            $payload['device_name'] = Browser::browserName();
            $payload['device_type'] = Browser::deviceType();
            $payload['operating_system'] = Browser::platformName();
            $payload['admin'] = $request->isAdmin() ? 1 : 0;
        }

        return $this;
    }
}
