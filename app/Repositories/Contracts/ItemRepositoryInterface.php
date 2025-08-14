<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;


interface ItemRepositoryInterface
{
    public function searchItems(?string $search): Collection;
    
    public function deleteItem(int $id): void;
}