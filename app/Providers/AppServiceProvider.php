<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrapFive();
        Paginator::defaultView('pagination::default');

        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });

        Gate::define('create-tutor', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('update-tutor', function (User $user, Tutor $tutor) {
            return $user->is_admin || $user->is_tutor;
        });

        Gate::define('destroy-tutor', function (User $user, Tutor $tutor) {
            return $user->is_admin || $user->is_tutor;
        });
    }
}
