<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SalesProductInterface;
use App\Repositories\SalesProductRepository;

class SalesProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SalesProductInterface::class, SalesProductRepository::class);
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
