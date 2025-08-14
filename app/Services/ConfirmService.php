<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Repositories\Contracts\ConfirmRepositoryInterface;
use InvalidArgumentException;

class ConfirmService {
    private $orderRepository;

    public function __construct(ConfirmRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function confirmOrder(Order $order, string $status): bool {
        $status = strtolower($status);

        if (!in_array($status, array_column(OrderStatusEnum::cases(), 'value'))) {
            throw new InvalidArgumentException('Invalid status');
        }

        return $this->orderRepository->updateStatus($order, OrderStatusEnum::from($status));
    }
}