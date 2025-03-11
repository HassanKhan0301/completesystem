@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Packing List</h2>

    <!-- Add Buying Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Packing</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('packing.create') }}">Add Packing</a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('packing.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="packing_type" class="form-control" placeholder="Search by Packing Type" value="{{ request()->get('packing_type') }}">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </div>
    </form>

    <!-- Buying Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Packing Type</th>
                <th>Packing Quantity</th>
                <th>Packing Price</th>
                <th>Total Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packing as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->packing_type }}</td>
                    <td>{{ $item->packing_quantity }}</td>
                    <td>{{ $item->packing_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                    <td>
                        <form method="post" action="{{ route('packing.destroy', $item->id) }}">
                            <a href="{{ route('packing.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('packing.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-0"> <i class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $packing->links() }}
    </div>
</div>

@endsection
