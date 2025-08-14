<?php

namespace App\Repositories\Contracts;

use App\Enums\OrderStatusEnum;
use App\Models\Order;

interface ConfirmRepositoryInterface
{
    public function find($id): ?Order;

    public function updateStatus(Order $order,OrderStatusEnum $status): bool;
}