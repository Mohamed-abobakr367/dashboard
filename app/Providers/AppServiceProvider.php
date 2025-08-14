<?php

namespace App\Providers;

use App\Repositories\AddItemRepository;
use App\Repositories\ConfirmRepository;
use App\Repositories\Contracts\AddItemRepositoryInterface;
use App\Repositories\Contracts\ConfirmRepositoryInterface;
use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\ItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SaleRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
        $this->app->bind(AddItemRepositoryInterface::class, AddItemRepository::class);
        $this->app->bind(ConfirmRepositoryInterface::class, ConfirmRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
