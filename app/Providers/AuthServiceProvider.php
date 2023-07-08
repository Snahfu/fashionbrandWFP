<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('owner-only', function($user){
            return ($user->role == 'owner');
        });
        Gate::define('pembeli-only', function($user){
            return ($user->role == 'pembeli');
        });
        Gate::define('staff-only', function($user){
            return ($user->role == 'staff');
        });
        
    }
}
