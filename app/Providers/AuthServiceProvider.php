<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class =>RolePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        //defining gates for operations
        Gate::define('create-post', 'App\Policies\RolePolicy@create');
        Gate::define('update-post', 'App\Policies\RolePolicy@update');
        Gate::define('delete-post', 'App\Policies\RolePolicy@delete');
    }
}
