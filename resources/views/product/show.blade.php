@extends('dashboard.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h4>Product Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vendor</label>
                            <p>{{ $product->vendor }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Raw Material</label>
                            <p>{{ $product->Raw_Material }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Article</label>
                            <p>{{ $product->Article }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cutting Type</label>
                            <p>{{ $product->cutting_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cutting Price</label>
                            <p>{{ $product->cutting_price }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cutting Quantity</label>
                            <p>{{ $product->cutting_quantity }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Printing Type</label>
                            <p>{{ $product->printing_type }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Printing Price</label>
                            <p>{{ $product->printing_price }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Printing Quantity</label>
                            <p>{{ $product->printing_quantity }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stitching Type</label>
                            <p>{{ $product->stitching_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stitching Price</label>
                            <p>{{ $product->stitching_price }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity Stitching</label>
                            <p>{{ $product->quantity_stitching }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cropping Type</label>
                            <p>{{ $product->cropping_type }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cropping Price</label>
                            <p>{{ $product->cropping_price }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity Cropping</label>
                            <p>{{ $product->quantity_cropping }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Packing Type</label>
                            <p>{{ $product->packing_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Packing Price</label>
                            <p>{{ $product->packing_price }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Delivery Type</label>
                            <p>{{ $product->Delivery_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Delivery Price</label>
                            <p>{{ $product->Delevery_price }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity Delivery</label>
                            <p>{{ $product->quantyty_delevery }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Product List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
