<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $items = $this->itemService->getItems($search);

        return view('admin.items.index', compact('items'))->with('search', $search);
    }

    public function destroy($id)
    {
        $this->itemService->deleteItem($id);
        return redirect()->route('items.index')->with('success', 'Item has been deleted successfully');
    }
}
