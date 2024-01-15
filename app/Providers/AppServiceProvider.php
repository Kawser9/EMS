<?php

namespace App\Providers;

use App\Models\backend\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
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


        $department=Department::all();
            view()->share('department', $department);

    
        Paginator::useBootstrap();
    }
}
