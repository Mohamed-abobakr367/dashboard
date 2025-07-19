<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ConfirmController extends Controller
{
    public function confirm(Order $order, $status)
    {
        $status = strtolower($status);

        if (!in_array($status, array_column(OrderStatusEnum::cases(), 'value'))) {
            abort(400, 'Invalid status');
        }

        $order->status = OrderStatusEnum::from($status);
        $order->save();

        return redirect()->back()->with('success', "Order marked as $status.");
    }
}
