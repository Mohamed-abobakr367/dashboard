<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SaleService;

class SalesController extends Controller
{
    public function __construct(
        protected SaleService $saleService
    ) {}

    public function index()
    {
        $sales = $this->saleService->listConfirmedSales();
        return view('admin.sales.index', compact('sales'));
    }
}
