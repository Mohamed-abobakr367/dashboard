@extends('layouts.pages')
@section('title', 'Users')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Users</h2>

    <table class="table table-bordered table-hover shadow rounded">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Items</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody class="text-center align-middle">
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @php
                            $statusColors = [
                                'active' => 'success',
                                'inactive' => 'secondary',
                                'banned' => 'danger',
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusColors[$user->user_status] ?? 'secondary' }}">
                            {{ ucfirst($user->user_status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('items.index', ['search' => $user->email]) }}" class="btn btn-primary btn-sm">
                            View Items
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit Status</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
