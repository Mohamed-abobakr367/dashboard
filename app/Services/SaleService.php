<?php

namespace App\Services;

use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SaleService
{
    public function __construct(
        protected SaleRepositoryInterface $saleRepository
    ) {}

    public function listConfirmedSales(): Collection
    {
        return $this->saleRepository->getConfirmedSales();
    }
}