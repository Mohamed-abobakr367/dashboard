<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
    public function getPendingOrders(): Collection;
}