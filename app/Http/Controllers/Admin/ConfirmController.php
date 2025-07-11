<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function confirm(Order $order, $status)
    {
        $status = strtolower($status);

        if (!in_array($status, array_column(OrderStatus::cases(), 'value'))) {
            abort(400, 'Invalid status');
        }

        $order->status = OrderStatus::from($status);
        $order->save();

        return redirect()->back()->with('success', "Order marked as $status.");
    }
}
