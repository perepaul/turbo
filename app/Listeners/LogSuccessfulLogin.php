<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use hisorange\BrowserDetect\Parser as Browser;

class LogSuccessfulLogin
{
    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (Request::isAdmin()) return;
        $user = User::findOrFail(auth()->user()->id);
        $ipInfo = request()->ipinfo;
        Log::info($ipInfo->all);
        if (is_null($ipInfo)) return;
        $browserName = Browser::browserName();
        $browserType = Browser::deviceType();
        $browserPlatform = Browser::platformName();

        $existing = Device::where('user_id', $user->id)->where('name', $browserName)->where('type', $browserType)->where('os', $browserPlatform)->first();
        if (!$existing) {
            $device = new Device();
            $device->user_id = $user->id;
            $device->name = $browserName;
            $device->type = $browserType;
            $device->os = $browserPlatform;
            $device->ip = $ipInfo->ip;
            $device->country = $ipInfo->country_name;
            $device->region = $ipInfo->region;
            $device->city = $ipInfo->city;
            $device->last_login = now()->toDateTimeString();
            $device->save();
            return;
        }
        $device = $existing;
        $device->ip = $ipInfo->ip;
        $device->country = $ipInfo->country_name;
        $device->region = $ipInfo->region;
        $device->city = $ipInfo->city;
        $device->last_login = now()->toDateTimeString();
        $device->save();
        return;
    }
}
