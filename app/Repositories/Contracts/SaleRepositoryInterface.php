<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SaleRepositoryInterface
{
    public function getConfirmedSales(): Collection;
}