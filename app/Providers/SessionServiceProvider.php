<?php

namespace App\Providers;

use App\Extensions\DatabaseSessionHandler;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $connection = config('session.connection');
        // $table = config('session.table');
        // $minutes = config('session.lifetime');
        // $container = Container::getInstance();

        // $this->app['session']->extend('database', function ($app) use ($connection, $table, $minutes, $container) {
        //     return new DatabaseSessionHandler(
        //         $app['db']->connection($connection),
        //         $table,
        //         $minutes,
        //         $container
        //     );
        // });

        // $this->app['session']->extend('admin_session', function ($app) use ($connection, $table, $minutes, $container) {
        //     return new DatabaseSessionHandler(
        //         $app['db']->connection($connection),
        //         $table,
        //         $minutes,
        //         $container
        //     );
        // });

        // if (request()->isAdmin()) {
        //     config(['session.driver' => 'admin_session']);
        // }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
