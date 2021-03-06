<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View, DB, Request;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (DB::connection()->getDatabaseName()) {
            View::composer('*', function ($view) {
                $site = Setting::first();
                $app_name = $site->app_name;
                $app_title = $site->app_title;
                $app_logo = $site->app_logo;
                $view->with('app_title', $app_title)
                    ->with('app_name', $app_name)
                    ->with('app_logo', $app_logo);
            });
        } else {
            if (Request::segment(1) !== 'install') {
                redirect('/install')->send();
            }
        }
    }
}
