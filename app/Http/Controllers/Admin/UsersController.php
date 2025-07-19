<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name','email','user_status',)->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_status' => 'required|in:active,inactive,banned',
        ]);

        $user->user_status = $request->user_status;
        $user->save();

        return redirect()->route('users')->with('success', 'User status updated.');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

}