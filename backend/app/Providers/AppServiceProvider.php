<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Staff\StaffRepositoryInterface;
use App\Repositories\Staff\StaffRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind the interface to the implementation
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
