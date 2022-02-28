<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Responses\LoginResponse as ResponsesLoginResponse;
use App\Responses\RegisterResponse as ResponsesRegisterResponse;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AuthenticatedSessionController as ControllersAuthenticatedSessionController;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthenticatedSessionController::class, ControllersAuthenticatedSessionController::class);
        // $this->app->bind(LoginResponse::class, ResponsesLoginResponse::class);
        $this->app->bind(RegisterResponse::class, ResponsesRegisterResponse::class);

        // $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        // {
        //     public function toResponse($request)
        //     {
        //         return redirect('/');
        //     }
        // });
        // $this->app->instance(LoginResponse::class, new class implements ContractsLoginResponse
        // {
        //     public function toResponse($request)
        //     {
        //         return redirect('/');
        //     }
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            if (request()->isAdmin()) return view('admin.auth.login');
            return view('user.auth.login');
        });

        Fortify::registerView(function () {
            return view('user.auth.register');
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
