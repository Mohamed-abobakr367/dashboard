<?php

namespace App\Services;

use App\Repositories\AddItemRepository;
use Illuminate\Http\Request;

class AddItemService
{
    protected $AdditemRepository;

    public function __construct(AddItemRepository $AdditemRepository)
    {
        $this->AdditemRepository = $AdditemRepository;
    }

    public function getCreateData()
    {
        return [
            'users' => $this->AdditemRepository->getUsers(),
            'categories' => $this->AdditemRepository->getCategories(),
        ];
    }

    public function storeItem(Request $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $this->AdditemRepository->createItem($data);

        return redirect()->route('items.index')->with('success', 'Product added successfully!');
    }
}