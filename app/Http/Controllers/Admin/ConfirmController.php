<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\ConfirmService;
use InvalidArgumentException;

class ConfirmController extends Controller {
    private $orderService;

    public function __construct(ConfirmService $orderService) {
        $this->orderService = $orderService;
    }

    public function confirm(Order $order, string $status) {
        try {
            $this->orderService->confirmOrder($order, $status);
            return redirect()->back()->with('success', "Order marked as {$status}.");
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withErrors(['status' => $e->getMessage()]);
        }
    }
}

