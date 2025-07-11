<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Order::with(['items', 'user'])
        ->where('status', 'confirmed')
        ->get();
        return view('admin.sales.index',compact('sales'));
    }
}
