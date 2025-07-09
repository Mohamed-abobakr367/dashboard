@extends('layouts.pages')

@section('title', 'Edit User Status')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Edit Status for {{ $user->name }}</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_status" class="form-label fw-bold">Account Status</label>
            <select name="user_status" id="user_status" class="form-select" required>
                <option value="active" {{ $user->user_status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $user->user_status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="banned" {{ $user->user_status === 'banned' ? 'selected' : '' }}>Banned</option>
            </select>
        </div>

        <div class="text-center">
            <button class="btn btn-success px-5">Update Status</button>
        </div>
    </form>
</div>
@endsection
