@extends('layouts.pages')
@section('title', 'Create Item')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Add New Item</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Price ($)</label>
            <input type="number" name="price" id="price" class="form-control" required value="{{ old('price') }}" step="0.01">
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label fw-bold">Seller (User)</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="" disabled selected>Select a user</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ ('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label fw-bold">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">No category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ ('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="text-center">
            <button class="btn btn-success px-5">Create Item</button>
        </div>
    </form>
</div>
@endsection
