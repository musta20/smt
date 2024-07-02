<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        //  dd(resource_path('views/newStyle/components'));
        Blade::anonymousComponentPath(
            resource_path('views/newStyle/components'),
            'newstyle'
        );

        Blade::anonymousComponentPath(
            resource_path('views/solid/components'),
            'solid'
        );

        Blade::anonymousComponentPath(
            resource_path('views/coffee/components'),
            'coffee'
        );

        if(config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
