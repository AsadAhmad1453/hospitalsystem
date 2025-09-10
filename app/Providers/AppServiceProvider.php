<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Role;
use App\Models\Service;
use App\Models\Form;
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
        View::composer('*', function ($view) {
            $view->with('roles', Role::all());
        });

        View::composer('user.layouts.main', function ($view) {
            $view->with('forms', Form::all());
        });

        View::composer('website.layouts.main', function ($view) {
            $view->with('services', Service::all());
        });
    }
}
