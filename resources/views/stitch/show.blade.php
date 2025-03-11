@extends('dashboard.layout.master')

@section('content')
<div class="container my-5">
    @if(isset($stitchingOrder))  <!-- Check if $stitchingOrder exists -->
        <h2 class="text-center mb-4 text-primary">Stitching Details for Order ID: {{ $stitchingOrder->orderId }}</h2>
        
        <!-- Show stitching details -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Stitching Order Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Stitching Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stitchingMaterials as $material)
                                <tr>
                                    <td>{{ $material->stitching_type }}</td>
                                    <td>{{ $material->stitching_quantity }}</td>
                                    <td>{{ number_format($material->stitching_price, 2) }}</td>
                                    <td>{{ number_format($material->total_amount, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($material->date)->format('d M Y') }}</td> <!-- Displaying formatted date -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order-related Buttons -->
        <div class="mt-3 text-center">
            <a href="{{ route('buying.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Add to Buying
            </a>
            <a href="{{ route('crop.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Add to Cropping
            </a>
            <a href="{{ route('cutting.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-cut"></i> Add to Cutting
            </a>
            <a href="{{ route('stitch.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-palette"></i> Add to Stitching
            </a>
            <a href="{{ route('print.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-print"></i> Add to Printing
            </a>
            <a href="{{ route('packing.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-primary">
                <i class="fas fa-box"></i> Add to Packing
            </a>
            <a href="{{ route('delivery.create', ['orderId' => $stitchingOrder->orderId]) }}" class="btn btn-success">
                <i class="fas fa-truck"></i> Proceed to Delivery
            </a>
        </div>

        <!-- Back and Edit Buttons -->
        <div class="mt-4 text-center">
            <a href="{{ route('stitch.index') }}" class="btn btn-primary btn-lg">Back to Stitching List</a>
        </div>
    @else
        <p class="text-center text-danger">No stitching record found for this Order ID.</p>
    @endif
</div>
@endsection
