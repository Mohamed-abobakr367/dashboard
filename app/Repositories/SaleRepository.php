<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SaleRepository implements SaleRepositoryInterface
{
    public function getConfirmedSales(): Collection
    {
        return Order::with(['items', 'user'])
            ->where('status', 'confirmed')
            ->get();
    }
}