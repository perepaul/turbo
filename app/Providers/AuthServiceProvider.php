<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        if(request()->isAdmin()){
            config(['fortify.guard'=>'admin']);
            config(['fortify.domain'=>admin_domain()]);
        }else if(request()->isUser())
        {
            config(['fortify.guard'=>'user']);
            config(['fortify.domain'=>user_domain()]);
        }

        //
    }
}
