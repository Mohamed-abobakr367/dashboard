<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;

interface UsersRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;
    public function updateStatus(User $user, string $status): bool;
}