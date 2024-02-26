<?php

namespace Codecrewinfotech\FormBuilder;

use Illuminate\Support\ServiceProvider;

class formbuilderserviceprovider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'formBuilder');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/public' => public_path('/'),
            __DIR__ . '/public/formBuilder-asset' => public_path('/formBuilder-asset'),
         ], 'public');

         $this->publishes([
            __DIR__.'/views' => resource_path('views'),
        ],'formBuilder-views');

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'formBuilder-migrations');
       

    }

    public function register()
    {

    }
}