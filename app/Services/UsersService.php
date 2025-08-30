<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UsersRepositoryInterface;

class UsersService
{
    public function __construct(
        protected UsersRepositoryInterface $usersRepository
    ) {}

    public function getPaginatedUsers(int $perPage = 10)
    {
        return $this->usersRepository->paginate($perPage);
    }

    public function changeStatus(User $user, string $status) : void
    {
        $this->usersRepository->updateStatus($user, $status);
    }
}