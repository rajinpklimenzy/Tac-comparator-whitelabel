<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    
     protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       
        $this->app->singleton('atrNotification', function () {
             return $this->app->make('App\Http\Helpers\Container\Notification\NotificationService');
        });
        $this->app->singleton('atrMenu', function () {
             return $this->app->make('App\Http\Helpers\Container\Menus\MenuService');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
