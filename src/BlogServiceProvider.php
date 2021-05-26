<?php

namespace Eburkina\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    $this->loadViewsFrom(__DIR__.'/views', 'Blog');
    
    $this->publishes([
        __DIR__.'/views' => resource_path('views/vendor/'),
    ], 'Views');

    $this->publishes([
        __DIR__.'/database/migrations' => database_path('migrations/')
    ], 'Migrations');
    $this->publishes([
        __DIR__.'/Http/controllers' => app_path('Http/Controllers/')
    ], 'Controllers');
    
    $this->publishes([
        __DIR__.'/Models' => app_path('Models/')
    ], 'Models');


    
    }

    
}
