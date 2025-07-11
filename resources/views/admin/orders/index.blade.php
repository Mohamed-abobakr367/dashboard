@extends('layouts.pages')
@section('title', 'Orders')

@section('content')
<div class="container">
    <h1>Pending Orders</h1>

    @foreach($orders as $order)
        <div class="mb-4 p-3 border rounded shadow-sm">
            <h5>{{ $order->user->name ?? 'Guest' }} ({{ $order->user->email ?? '-' }})</h5>
            <p><strong>Address:</strong> {{ $order->customer_address }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-{{ 
                    $order->status->value === 'pending' ? 'warning' :
                    ($order->status->value === 'confirmed' ? 'success' : 'danger') }}">
                    {{ ucfirst($order->status->value) }}
                </span>
            </p>
            <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                                <td>{{ number_format($item->price, 2) }} EGP</td>
                                <td>{{ number_format($item->pivot->quantity * $item->price, 2) }} EGP</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Total:</th>
                            <th>
                                {{ number_format($order->items->sum(fn($item) => $item->pivot->quantity * $item->price), 2) }} EGP
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @if ($order->status->value === 'pending')
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <form method="POST" action="{{ route('admin.orders.confirm', [$order->id, 'confirmed']) }}">
                        @csrf @method('PUT')
                        <button class="btn btn-success">Confirm</button>
                    </form>

                    <form method="POST" action="{{ route('admin.orders.confirm', [$order->id, 'canceled']) }}">
                        @csrf @method('PUT')
                        <button class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
