<?php

namespace App\Http\Controllers\Admin;


use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items'])
            ->where('status', OrderStatusEnum::Pending)
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }
}
