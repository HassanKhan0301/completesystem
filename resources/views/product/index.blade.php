@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Product List</h2>
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Add Product</span>
        </h4>
        <a class="btn btn-primary q-1" href="{{ route('product.create') }}"> Add Product</a>
    </div>

    





    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table to display products -->
    <table id="#example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>Article</th>
                <th>Raw Material</th>
                <th>Cutting Type</th>
                <th>Quantity Delivery</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($product as $key => $item)
                <tr>
                    <td>{{ $item->vendor }}</td>
                    <td>{{ $item->Article }}</td>
                    <td>{{ $item->Raw_Material }}</td>
                    <td>{{ $item->cutting_type }}</td>
                
                    <td>{{ $item->quantyty_delevery }}</td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', $item->id) }}">
                            <a href="{{ route('product.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('product.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-0"> <i class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection
