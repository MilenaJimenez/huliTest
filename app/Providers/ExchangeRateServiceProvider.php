<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class ExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind('App\Library\Services\ExchangeRateService', function ($app) {
          return new ExchangeRateService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
