@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
    @if($printingOrder)
        <h2 class="text-center mb-4 text-primary">Printing Details for Order ID: {{ $printingOrder->orderId }}</h2>
        
        <!-- Printing Order Details -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Printing Order Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($printingMaterials as $material)
                            <tr>
                                <td>{{ $material->printing_type }}</td>
                                <td>{{ $material->printing_quantity }}</td>
                                <td>{{ number_format($material->printing_price, 2) }}</td>
                                <td>{{ number_format($material->total_amount, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($material->date)->format('d M Y') }}</td> <!-- Displaying formatted date -->
                            </tr>
                            @endforeach
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
                            <td>{{ $printingOrder->orderId }}</td>
                        </tr>
                        <tr>
                            <th>Printing Type</th>
                            <td>{{ $printingOrder->printing_type }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ number_format($printingOrder->printing_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $printingOrder->printing_quantity }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ number_format($printingOrder->total_amount, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order-related Buttons -->
        <div class="mt-3">
            <a href="{{ route('buying.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Add to Buying
            </a>
            <a href="{{ route('crop.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Add to Cropping
            </a>
            <a href="{{ route('cutting.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cut"></i> Add to Cutting
            </a>
            <a href="{{ route('stitch.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-palette"></i> Add to Stitching
            </a>
            <a href="{{ route('print.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-print"></i> Add to Printing
            </a>
            <a href="{{ route('packing.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-box"></i> Add to Packing
            </a>
            <a href="{{ route('delivery.create', ['orderId' => $printingOrder->orderId]) }}" class="btn btn-success">
                <i class="fas fa-truck"></i> Proceed to Delivery
            </a>
        </div>

        <!-- Back Button -->
        <div class="mb-4 text-center">
            <a href="{{ route('print.index') }}" class="btn btn-primary btn-lg">Back to Printing List</a>
        </div>
    @else
        <p class="text-center text-danger">No printing record found for this Order ID.</p>
    @endif
</div>
@endsection
