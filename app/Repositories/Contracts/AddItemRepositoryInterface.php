<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;
use App\Models\Item;

interface AddItemRepositoryInterface
{
    public function getUsers(): Collection;

    public function getCategories(): Collection;

    public function createItem(array $data): Item;
}