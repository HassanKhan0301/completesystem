@extends('dashboard.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h2>Edit Order</h2>
        
        <form action="{{ route('order.update', $order->id) }}" method="POST" class="forms-sample">
            @csrf
            @method('PUT') <!-- This ensures the form uses the PUT HTTP method for updating -->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date:</label>
                        <input type="date" name="to" id="to" class="form-control" value="{{ old('to', $order->to) }}">
                        @if ($errors->has('to'))
                            <span class="text-danger">{{ $errors->first('to') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Vendor Name:</label>
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control" placeholder="Vendor Name" value="{{ old('vendor_name', $order->vendor_name) }}" required>
                        @if ($errors->has('vendor_name'))
                            <span class="text-danger">{{ $errors->first('vendor_name') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Article Number:</label>
                        <input type="number" name="Article_number" id="Article_number" class="form-control" placeholder="Article Number" value="{{ old('Article_number', $order->Article_number) }}">
                        @if ($errors->has('Article_number'))
                            <span class="text-danger">{{ $errors->first('Article_number') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Article Name:</label>
                        <input type="text" name="Article_name" id="Article_name" class="form-control" placeholder="Article Name" value="{{ old('Article_name', $order->Article_name) }}">
                        @if ($errors->has('Article_name'))
                            <span class="text-danger">{{ $errors->first('Article_name') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity', $order->quantity) }}">
                        @if ($errors->has('quantity'))
                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Unit Price:</label>
                        <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" placeholder="Unit Price" value="{{ old('unit_price', $order->unit_price) }}">
                        @if ($errors->has('unit_price'))
                            <span class="text-danger">{{ $errors->first('unit_price') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Subtotal:</label>
                        <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" value="{{ old('subtotal', $order->subtotal) }}" readonly>
                        @if ($errors->has('subtotal'))
                            <span class="text-danger">{{ $errors->first('subtotal') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Delivery Date:</label>
                        <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="{{ old('delivery_date', $order->delivery_date) }}">
                        @if ($errors->has('delivery_date'))
                            <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status:</label>
                        <select name="status" class="form-control">
                            <option value="complete" {{ $order->status == 'complete' ? 'selected' : '' }}>Complete</option>
                            <option value="incomplete" {{ $order->status == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
