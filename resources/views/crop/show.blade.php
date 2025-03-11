@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
@if($cropping)
    <h2 class="text-center mb-4 text-primary">Cropping Details for Order ID: {{ $cropping->orderId }}</h2>
        
    <!-- Cropping Order Details -->
    <div class="mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Cropping Order Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $cropping->cropping_type }}</td>
                            <td>{{ $cropping->cropping_quantity }}</td>
                            <td>{{ number_format($cropping->cropping_price, 2) }}</td>
                            <td>{{ number_format($cropping->total_amount, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Order Information -->
    <div class="mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="mb-0">Order Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Order ID</th>
                        <td>{{ $cropping->orderId }}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{ $cropping->cropping_type }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ number_format($cropping->cropping_price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{ $cropping->cropping_quantity }}</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td>{{ number_format($cropping->total_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ \Carbon\Carbon::parse($cropping->date)->format('d-m-Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Order-related Buttons -->
    <div class="mt-3 text-center">
        <a href="{{ route('buying.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-cart-plus"></i> Add to Buying
        </a>
        <a href="{{ route('crop.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-seedling"></i> Add to Cropping
        </a>
        <a href="{{ route('cutting.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-cut"></i> Add to Cutting
        </a>
        <a href="{{ route('stitch.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-palette"></i> Add to Stitching
        </a>
        <a href="{{ route('print.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-print"></i> Add to Printing
        </a>
        <a href="{{ route('packing.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-primary">
            <i class="fas fa-box"></i> Add to Packing
        </a>
        <a href="{{ route('delivery.create', ['orderId' => $cropping->orderId]) }}" class="btn btn-success">
            <i class="fas fa-truck"></i> Proceed to Delivery
        </a>
    </div>

    <!-- Back Button -->
    <div class="mb-4 text-center">
        <a href="{{ route('crop.index') }}" class="btn btn-primary btn-lg">Back to Cropping List</a>
    </div>
@else
    <p class="text-center text-danger">No cropping record found for this Order ID.</p>
@endif
</div>
@endsection
