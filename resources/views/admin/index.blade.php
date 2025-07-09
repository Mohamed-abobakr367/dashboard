@extends('layouts.pages')
@section('title','dashboard')
@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="display-5">Dashboard</h1>
        <p class="lead text-muted">Manage your data from here</p>
        <hr>
    </div>

    <div class="row g-4">
        <!-- Users -->
        <div class="col-md-3 col-sm-6">
            <div class="card text-white bg-primary shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text fs-3 fw-bold">{{ $userCount }}</p>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-md-3 col-sm-6">
            <div class="card text-white bg-success shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Items</h5>
                    <p class="card-text fs-3 fw-bold">{{$itemCount}}</p>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="col-md-3 col-sm-6">
            <div class="card text-white bg-warning shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text fs-3 fw-bold">{{$orderCount}}</p>
                </div>
            </div>
        </div>

        <!-- Sales -->
        <div class="col-md-3 col-sm-6">
            <div class="card text-white bg-purple shadow text-center" style="background-color: #6f42c1;">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>
                    <p class="card-text fs-3 fw-bold">{{$salesCount}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection