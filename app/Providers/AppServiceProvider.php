<?php

namespace App\Providers;

use App\Theme\Theme;
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
       // FilePreviewController::$middleware = ['web', 'universal', InitializeTenancyByDomain::class];
      // config(['view.paths'=>[resource_path('newTheme')]]);
      //  dd(tenant());

        //
        // specify the right identification middleware
    }
}
