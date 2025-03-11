@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Delivery List</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('delivery.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by Delivery Type" value="{{ request()->get('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Add Delivery Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Delivery</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('delivery.create') }}">Add Delivery</a>
    </div>

    <!-- Delivery Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Delivery Type</th>
                <th>Delivery Quantity</th>
                <th>Delivery Price</th>
                <th>Total Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($delivery as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->delivery_type }}</td>
                    <td>{{ $item->delivery_quantity }}</td>
                    <td>{{ $item->delivery_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                    <td>
                        <form method="post" action="{{ route('delivery.destroy', $item->id) }}">
                            <a href="{{ route('delivery.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('delivery.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
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
        {{ $delivery->links() }}
    </div>
</div>

@endsection
