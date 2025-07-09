@extends('layouts.pages')
@section('title', 'items')

@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row mb-4">
            <div class="col-md-8">
                <form action="" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search items..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{route('items.create')}}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Add Item
                </a>
            </div>
        </div>
        @if($items->count() > 0)
            @foreach ($items as $item)
                <div class="col-md-6 col-lg-4 mb-4"> 
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">{{ $item->price }}$</p>
                            <p class="card-text">{{ $item->user->email }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center text-warning fw-bold" style="font-size: 1.2rem;">
                @if(!empty($search))
                    No items found for "{{ $search }}"
                @else
                    No items available yet.
                @endif
            </div>
        @endif
    </div>
</div>
@endsection

@endsection
