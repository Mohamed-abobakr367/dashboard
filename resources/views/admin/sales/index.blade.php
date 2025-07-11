{{-- resources/views/admin/sales/index.blade.php --}}

@extends('layouts.pages')
@section('title', 'Sales')
@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Confirmed Sales</h1>

    @forelse ($sales as $sale)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $sale->user->name ?? 'Guest' }} ({{ $sale->user->email ?? '-' }})
                </h5>
                <p class="mb-1"><strong>Address:</strong> {{ $sale->customer_address }}</p>
                <p class="mb-1"><strong>Status:</strong>
                    <span class="badge bg-success">Confirmed</span>
                </p>
                <p><strong>Created At:</strong> {{ $sale->created_at->format('Y-m-d H:i') }}</p>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->items as $index => $item)
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
                                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                <td>
                                    {{ number_format($sale->items->sum(fn($item) => $item->pivot->quantity * $item->price), 2) }} EGP
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No confirmed sales found.</div>
    @endforelse
</div>

@endsection