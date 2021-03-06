<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('generator', function() {
            return new \App\Generator;
        });
    }
}
