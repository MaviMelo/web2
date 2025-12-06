<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        
        //    /**Gate para rotas acessadas por admin apenas */
        //    Gate::define('admin', function ($super){
        //        return $user->role === 'admin';
        //    });
        //    
        //    /**Gate para rotas acessadas por staff (admin e librarian) */
        //    Gate::define('staff', function ($super){
        //        return in_array($user->role, ['admin', 'librarian']);
        //    });
    }
}
