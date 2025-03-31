<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\Item\ItemRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind the interface to the implementation
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
