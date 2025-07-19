<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('category', 'user');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhereHas('user', function ($subQ) use ($search) {
                      $subQ->where('email', 'like', "%$search%");
                  })
                  ->orWhereHas('category', function ($subQ) use ($search) {
                      $subQ->where('name', 'like', "%$search%");
                  });
            });
        }
    
        $items = $query->get();
    
        return view('admin.items.index', compact('items'))->with('search', $request->search);
    }

    
}
