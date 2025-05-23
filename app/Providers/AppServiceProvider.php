<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('admin', function (User $user) {
            return $user->role == 1;
        });
        Gate::define('guru', function (User $user) {
            return $user->role == 2;
        });
        Gate::define('siswa', function (User $user) {
            return $user->role == 3;
        });
    }
}
