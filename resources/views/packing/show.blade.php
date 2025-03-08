@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
    @if($packing) <!-- Check if $packing exists -->
        <h2 class="text-center mb-4 text-primary">Packing Details for Order ID: {{ $packing->orderId }}</h2>
        
        <!-- Show basic packing order details -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Packing Order Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $packing->material }}</td>
                                <td>{{ $packing->quantity }}</td>
                                <td>{{ $packing->unit }}</td>
                                <td>{{ number_format($packing->price, 2) }}</td>
                                <td>{{ number_format($packing->total_amount, 2) }}</td>
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
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Material</th>
                            <td>{{ $packing->material }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($packing->price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $packing->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ number_format($packing->total_amount, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order-related Buttons -->
        <div class="mt-3">
            <a href="{{ route('buying.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Add to Buying
            </a>
            <a href="{{ route('crop.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Add to Cropping
            </a>
            <a href="{{ route('cutting.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-cut"></i> Add to Cutting
            </a>
            <a href="{{ route('stitch.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-palette"></i> Add to Stitching
            </a>
            <a href="{{ route('print.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-print"></i> Add to Printing
            </a>
            <a href="{{ route('packing.create', ['orderId' => $order->id]) }}" class="btn btn-primary">
                <i class="fas fa-box"></i> Add to Packing
            </a>
            <a href="{{ route('delivery.create', ['orderId' => $order->id]) }}" class="btn btn-success">
                <i class="fas fa-truck"></i> Proceed to Delivery
            </a>
        </div>

        <!-- Back Button -->
        <div class="mb-4 text-center">
            <a href="{{ route('packing.index') }}" class="btn btn-primary btn-lg">Back to Packing List</a>
        </div>
    @else
        <p class="text-center text-danger">No packing record found for this Order ID.</p>
    @endif
</div>
@endsection
