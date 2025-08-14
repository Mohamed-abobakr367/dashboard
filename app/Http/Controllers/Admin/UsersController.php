<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UsersRequest;
use App\Models\User;
use App\Services\UsersService;

class UsersController extends Controller
{
    public function __construct(
        protected UsersService $usersService
    ) {}

    public function index()
    {
        $users = $this->usersService->getPaginatedUsers();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UsersRequest $request, User $user)
    {
        $this->usersService->changeStatus($user, $request->user_status);

        return redirect()
            ->route('users.index')
            ->with('success', 'User status updated.');
    }
}