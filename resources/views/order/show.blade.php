@extends('dashboard.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h2>Order Details</h2>

        <!-- Order Details -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="{{ $order->to }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Vendor Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $order->vendor_name }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Article Number:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="{{ $order->Article_number }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Article Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $order->Article_name }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quantity:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="{{ $order->quantity }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Delivery Date:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="{{ $order->delivery_date }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Fields for Unit Price and Subtotal -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit Price:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="{{ $order->unit_price }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Subtotal:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="{{ $order->subtotal }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status:</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $order->status === 'complete' ? 'Complete' : 'Incomplete' }}" disabled>

                    </div>
                </div>
            </div>
        </div>

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
<a href="{{ route('order.invoice', ['orderId' => $order->id]) }}" class="btn btn-info" target="_blank">
    <i class="fas fa-download"></i> Download Invoice
</a>

        </div>
    </div>
@endsection
