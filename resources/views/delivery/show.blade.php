@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
    @if($delivery) 
        <h2 class="text-center mb-4 text-primary">Delivery Details for Order ID: {{ $delivery->orderId }}</h2>
        
        <!-- Delivery Order Details -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Delivery Order Information</h3>
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
                                <td>{{ $delivery->delivery_type }}</td>
                                <td>{{ $delivery->delivery_quantity }}</td>
                                <td>{{ number_format($delivery->delivery_price, 2) }}</td>
                                <td>{{ number_format($delivery->total_amount, 2) }}</td>
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
                            <td>{{ $delivery->orderId }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $delivery->delivery_type }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($delivery->delivery_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $delivery->delivery_quantity }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ number_format($delivery->total_amount, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order-related Buttons -->
        <div class="mt-3">
            <a href="{{ route('buying.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Add to Buying
            </a>
            <a href="{{ route('crop.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Add to Cropping
            </a>
            <a href="{{ route('cutting.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cut"></i> Add to Cutting
            </a>
            <a href="{{ route('stitch.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-palette"></i> Add to Stitching
            </a>
            <a href="{{ route('print.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-print"></i> Add to Printing
            </a>
            <a href="{{ route('packing.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-box"></i> Add to Packing
            </a>
            <a href="{{ route('delivery.create', ['orderId' => $delivery->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-truck"></i> Add to Delivery
            </a>
        </div>

        <!-- Back Button -->
        <div class="mb-4 text-center">
            <a href="{{ route('delivery.index') }}" class="btn btn-primary btn-lg">Back to Delivery List</a>
        </div>
    @else
        <p class="text-center text-danger">No delivery record found for this Order ID.</p>
    @endif
</div>
@endsection
