<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $itemCount = Item::count();
        $orderCount = Order::count();
        $salesCount = Order::where('status', 'confirmed')->count();
        return view('admin.index', compact('userCount','itemCount','orderCount','salesCount'));
    }
}
