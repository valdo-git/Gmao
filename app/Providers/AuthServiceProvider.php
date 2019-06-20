<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //ajouté par moi pour gérer les menus de adminlte
        Gate::define('Admin-manager', function ($user) {//pour l'admin
            return $user->role_id == 0;
        });
        Gate::define('GT-manager', function ($user) {//pour l'op GT
            return $user->role_id == 1;
        });
        Gate::define('Germac-manager', function ($user) {//pour l'op germac
            return $user->role_id == 2;
        });
        Gate::define('Technicien-manager', function ($user) {//pour les techniciens
            return $user->role_id == 3;
        });
    }
}
