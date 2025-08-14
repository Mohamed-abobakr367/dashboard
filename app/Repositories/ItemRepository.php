<?php
namespace App\Repositories;

use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Support\Collection;

class ItemRepository implements ItemRepositoryInterface
{
    protected $itemModel;

    public function __construct(Item $item)
    {
        $this->itemModel = $item;
    }
    
    public function searchItems(?string $search): Collection
    {
        return $this->itemModel
            ->with(['category', 'user'])
            ->when($search, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhereHas('user', fn($q) => $q->where('email', 'like', "%$search%"))
                      ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%$search%"));
                });
            })
            ->get();
    }
    
    public function deleteItem(int $id): void
    {
        $this->itemModel->findOrFail($id)->delete();
    }
}