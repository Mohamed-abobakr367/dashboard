<?php

namespace App\Http\Controllers\Admin;



use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
    $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getPendingOrders();
        return view('admin.orders.index', compact('orders'));
    }
}
