<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Repositories\Contracts\AddItemRepositoryInterface;
use Illuminate\Support\Collection;


class AddItemRepository implements AddItemRepositoryInterface
{
    protected $userModel;
    protected $categoryModel;
    protected $itemModel;

    public function __construct(User $user, Category $category, Item $item)
    {
        $this->userModel = $user;
        $this->categoryModel = $category;
        $this->itemModel = $item;
    }

    public function getUsers(): Collection
    {
        return $this->userModel->select('email')->get();
    }

    public function getCategories(): Collection
    {
        return $this->categoryModel->select('name')->get();
    }

    public function createItem(array $data): Item
    {
        $item = $this->itemModel->create([
            'name'        => $data['name'],
            'price'       => $data['price'],
            'category_id' => $data['category_id'],
            'user_id'     => $data['user_id'],
            'image'       => $data['image'] ?? null,
        ]);

        return $item;
    }
}
