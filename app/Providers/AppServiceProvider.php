<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Gate::define('admin', function(User $user){
            return $user && $user->is_admin;
        });
    }
}
