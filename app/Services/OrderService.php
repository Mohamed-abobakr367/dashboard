<?php 

namespace App\Services;

;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Collection;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getPendingOrders(): Collection
    {
        return $this->orderRepository->getPendingOrders();
    }
}