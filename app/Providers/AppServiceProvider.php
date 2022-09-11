<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('super_admin', function(User $user) {
            return $user->id_level == 1;
        });
        Gate::define('admin', function(User $user) {
            return $user->id_level == 2;
        });
        Gate::define('general', function(User $user) {
            return $user->id_level == 1 or $user->id_level == 2;
        });
    }
}
