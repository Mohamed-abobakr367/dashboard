<?php

namespace App\Services;

use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getItems(?string $search): Collection
    {
        return $this->itemRepository->searchItems($search);
    }

    public function deleteItem(int $id): void
    {
        $this->itemRepository->deleteItem($id);
    }
}