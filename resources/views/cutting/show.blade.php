@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
    @if($cutting)
        <h2 class="text-center mb-4 text-primary">Cutting Details for Order ID: {{ $cutting->orderId }}</h2>
        
        <!-- Cutting Order Details -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Cutting Order Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                                <th>Date</th> <!-- Added Date Column -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $cutting->cutting_type }}</td>
                                <td>{{ $cutting->cutting_quantity }}</td>
                                <td>{{ number_format($cutting->cutting_price, 2) }}</td>
                                <td>{{ number_format($cutting->total_amount, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($cutting->date)->format('d-m-Y') }}</td> <!-- Formatted Date -->
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
                            <td>{{ $cutting->orderId }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $cutting->cutting_type }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($cutting->cutting_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $cutting->cutting_quantity }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ number_format($cutting->total_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ \Carbon\Carbon::parse($cutting->date)->format('d-m-Y') }}</td> <!-- Formatted Date -->
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order-related Buttons -->
        <div class="mt-3 text-center">
            <a href="{{ route('buying.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Add to Buying
            </a>
            <a href="{{ route('crop.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Add to Cropping
            </a>
            <a href="{{ route('cutting.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cut"></i> Add to Cutting
            </a>
            <a href="{{ route('stitch.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-palette"></i> Add to Stitching
            </a>
            <a href="{{ route('print.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-print"></i> Add to Printing
            </a>
            <a href="{{ route('packing.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-box"></i> Add to Packing
            </a>
            <a href="{{ route('delivery.create', ['orderId' => $cutting->orderId]) }}" class="btn btn-success">
                <i class="fas fa-truck"></i> Proceed to Delivery
            </a>
        </div>

        <!-- Back Button -->
        <div class="mb-4 text-center">
            <a href="{{ route('cutting.index') }}" class="btn btn-primary btn-lg">Back to Cutting List</a>
        </div>
    @else
        <p class="text-center text-danger">No cutting record found for this Order ID.</p>
    @endif
</div>
@endsection
