@extends('dashboard.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf
            @method('PUT') 

            <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Vendor</label>
                <select name="vendor" class="form-control" id="vendor">
                    <option value="">Select Vendor</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->vendor_name }}" {{ $product->vendor == $vendor->vendor_name ? 'selected' : '' }}>
                            {{ $vendor->vendor_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Raw Material</label>
                        <input type="text" name="Raw_Material" class="form-control" placeholder="Raw Material..." value="{{  $product->Raw_Material }}">
                    </div>
                </div>
            </div>

            <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Article</label>
                <select name="Article" class="form-control" id="article">
                    <option value="">Select Article</option>
                    @foreach ($articles as $article)
                        <option value="{{ $article->Article_name }}" {{ $product->Article == $article->Article_name ? 'selected' : '' }}>
                            {{ $article->Article_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

            <!-- Cutting Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cutting Type</label>
                        <input type="text" name="cutting_type" class="form-control" placeholder="Cutting Type..." value="{{ $product->cutting_type }}">
                    </div>
                </div>
            </div>

            <!-- Cutting Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cutting Price</label>
                        <input type="number" name="cutting_price" class="form-control" placeholder="Cutting Price..." value="{{  $product->cutting_price }}">
                    </div>
                </div>
            </div>

            <!-- Cutting Quantity -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cutting Quantity</label>
                        <input type="number" name="cutting_quantity" class="form-control" placeholder="Cutting Quantity..." value="{{  $product->cutting_quantity }}">
                    </div>
                </div>
            </div>

            <!-- Printing Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Printing Type</label>
                        <input type="text" name="printing_type" class="form-control" placeholder="Printing Type..." value="{{  $product->printing_type }}">
                    </div>
                </div>
            </div>

            <!-- Printing Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Printing Price</label>
                        <input type="number" name="printing_price" class="form-control" placeholder="Printing Price..." value="{{  $product->printing_price }}">
                    </div>
                </div>
            </div>

            <!-- Printing Quantity -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Printing Quantity</label>
                        <input type="number" name="printing_quantity" class="form-control" placeholder="Printing Quantity..." value="{{  $product->printing_quantity }}">
                    </div>
                </div>
            </div>

            <!-- Stitching Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stitching Type</label>
                        <input type="text" name="stitching_type" class="form-control" placeholder="Stitching Type..." value="{{  $product->stitching_type }}">
                    </div>
                </div>
            </div>

            <!-- Stitching Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stitching Price</label>
                        <input type="number" name="stitching_price" class="form-control" placeholder="Stitching Price..." value="{{  $product->stitching_price }}">
                    </div>
                </div>
            </div>

            <!-- Quantity Stitching -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity Stitching</label>
                        <input type="number" name="quantity_stitching" class="form-control" placeholder="Quantity Stitching..." value="{{  $product->quantity_stitching }}">
                    </div>
                </div>
            </div>

            <!-- Cropping Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cropping Type</label>
                        <input type="text" name="cropping_type" class="form-control" placeholder="Cropping Type..." value="{{  $product->cropping_type }}">
                    </div>
                </div>
            </div>

            <!-- Cropping Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cropping Price</label>
                        <input type="number" name="cropping_price" class="form-control" placeholder="Cropping Price..." value="{{  $product->cropping_price }}">
                    </div>
                </div>
            </div>

            <!-- Quantity Cropping -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity Cropping</label>
                        <input type="number" name="quantity_cropping" class="form-control" placeholder="Quantity Cropping..." value="{{  $product->quantity_cropping }}">
                    </div>
                </div>
            </div>

            <!-- Packing Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Packing Type</label>
                        <input type="text" name="packing_type" class="form-control" placeholder="Packing Type..." value="{{  $product->packing_type }}">
                    </div>
                </div>
            </div>

            <!-- Packing Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Packing Price</label>
                        <input type="number" name="packing_price" class="form-control" placeholder="Packing Price..." value="{{  $product->packing_price }}">
                    </div>
                </div>
            </div>

            <!-- Delivery Type -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Delivery Type</label>
                        <input type="text" name="Delivery_type" class="form-control" placeholder="Delivery Type..." value="{{  $product->Delivery_type }}">
                    </div>
                </div>
            </div>

            <!-- Delivery Price -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Delivery Price</label>
                        <input type="number" name="Delevery_price" class="form-control" placeholder="Delivery Price..." value="{{  $product->Delevery_price }}">
                    </div>
                </div>
            </div>

            <!-- Quantity Delivery -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity Delivery</label>
                        <input type="number" name="quantyty_delevery" class="form-control" placeholder="Quantity Delivery..." value="{{  $product->quantyty_delevery }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
