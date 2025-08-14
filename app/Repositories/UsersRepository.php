<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UsersRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UsersRepository implements UsersRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return User::select('id', 'name', 'email', 'user_status')
            ->paginate($perPage);
    }

    public function updateStatus(User $user, string $status): bool
    {
        return $user->update(['user_status' => $status]);
    }
}