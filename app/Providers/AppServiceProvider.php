<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Features\SupportFileUploads\FilePreviewController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

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

        //  Blade::componentNamespace('App\\Views\\newStyle\\Components', 'newStyle');

        // FilePreviewController::$middleware = ['web', 'universal', InitializeTenancyByDomain::class];
        // config(['view.paths'=>[resource_path('newTheme')]]);
        //  dd(tenant());

        //
        // specify the right identification middleware
    }
}
