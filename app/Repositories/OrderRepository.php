<?php

namespace App\Repositories;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    protected $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function getPendingOrders(): Collection
    {
        return $this->orderModel
        ->with(['user', 'items'])
        ->where('status', OrderStatusEnum::Pending)
        ->latest()
        ->get();
    }
}