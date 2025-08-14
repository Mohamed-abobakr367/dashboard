<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\AddItemRequest;
use App\Services\AddItemService;



class AddItemController extends Controller
{
    protected $itemService;

    public function __construct(AddItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function create()
    {
        $data = $this->itemService->getCreateData();
        return view('admin.items.create', $data);
    }

    public function store(AddItemRequest $request)
    {
        return $this->itemService->storeItem($request);
    }
}
    