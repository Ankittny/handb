<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\Repositories\WholsalerRepositoryInterface;
use App\Repositories\WholsalerRepository;

class wholesalerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WholsalerRepositoryInterface::class, WholsalerRepository::class);
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

