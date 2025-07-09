@extends('layouts.pages')
@section('title','users')
@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Sales Report</h2>

    @if($sales->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Buyer</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->item->name }}</td>
                            <td>{{ $sale->user->email }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ number_format($sale->price_at_sale, 2) }}$</td>
                            <td class="fw-bold text-success">{{ number_format($sale->price_at_sale * $sale->quantity, 2) }}$</td>
                            <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning text-center fw-bold">
            No sales have been recorded yet.
        </div>
    @endif
</div>
@endsection