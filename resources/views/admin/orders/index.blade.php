@extends('layouts.pages')
@section('title','users')
@section('content')

<div class="container">
    <h1>All Orders</h1>
    @foreach($orders as $order)
        <div class="mb-4 p-3 border">
            <h5>{{ $order->name }} ({{ $order->email }})</h5>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Items:</strong> {{ $order->items }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at }}</p>
        </div>
    @endforeach
</div>
@endsection
