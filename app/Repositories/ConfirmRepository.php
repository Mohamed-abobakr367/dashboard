<?php

namespace App\Repositories;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Repositories\Contracts\ConfirmRepositoryInterface;

class ConfirmRepository implements ConfirmRepositoryInterface
{
    protected $ordermodel;

    public function __construct(Order $order)
    {
        $this->ordermodel=$order;
    }

    public function find($id): ?Order
    {
        return $this->ordermodel->find($id);
    }

    public function updateStatus(Order $order,OrderStatusEnum $status): bool
    {
        $order->status = $status;
        return $order->save();
    }
}

