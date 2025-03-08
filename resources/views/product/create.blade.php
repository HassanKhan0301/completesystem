@extends('dashboard.layout.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Order No.</label>
                    <select name="orderId" class="form-control" id="orderId">
                        <option value="">Select Order no.</option>
                        @foreach ($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Raw Material</label>
                    <input type="text" name="Raw_Material" class="form-control" placeholder="Raw Material...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cutting Type</label>
                    <input type="text" name="cutting_type" class="form-control" placeholder="Cutting Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cutting Price</label>
                    <input type="number" name="cutting_price" class="form-control" placeholder="Cutting Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cutting Quantity</label>
                    <input type="number" name="cutting_quantity" class="form-control" placeholder="Cutting Quantity...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Printing Type</label>
                    <input type="text" name="printing_type" class="form-control" placeholder="Printing Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Printing Price</label>
                    <input type="number" name="printing_price" class="form-control" placeholder="Printing Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Printing Quantity</label>
                    <input type="number" name="printing_quantity" class="form-control"
                        placeholder="Printing Quantity...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stitching Type</label>
                    <input type="text" name="stitching_type" class="form-control" placeholder="Stitching Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Stitching Price</label>
                    <input type="number" name="stitching_price" class="form-control" placeholder="Stitching Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quantity Stitching</label>
                    <input type="number" name="quantity_stitching" class="form-control"
                        placeholder="Quantity Stitching...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cropping Type</label>
                    <input type="text" name="cropping_type" class="form-control" placeholder="Cropping Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cropping Price</label>
                    <input type="number" name="cropping_price" class="form-control" placeholder="Cropping Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quantity Cropping</label>
                    <input type="number" name="quantity_cropping" class="form-control"
                        placeholder="Quantity Cropping...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Packing Type</label>
                    <input type="text" name="packing_type" class="form-control" placeholder="Packing Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Packing Price</label>
                    <input type="number" name="packing_price" class="form-control" placeholder="Packing Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Delivery Type</label>
                    <input type="text" name="Delivery_type" class="form-control" placeholder="Delivery Type...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Delivery Price</label>
                    <input type="number" name="Delevery_price" class="form-control" placeholder="Delivery Price...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quantity Delivery</label>
                    <input type="number" name="quantyty_delevery" class="form-control"
                        placeholder="Quantity Delivery...">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection
