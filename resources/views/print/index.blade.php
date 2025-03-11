@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Printing List</h2>

    <!-- Add Printing Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Printing</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('print.create') }}">Add Printing</a>
    </div>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('print.index') }}" class="d-flex mb-4">
        <input type="text" name="search" class="form-control" placeholder="Search by printing type" value="{{ request()->search }}">
        <button type="submit" class="btn btn-secondary ms-2">Search</button>
    </form>

    <!-- Printing Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Printing Type</th>
                <th>Printing Quantity</th>
                <th>Printing Price</th>
                <th>Total Amount</th>
                <th>Date</th> <!-- Added Date Column -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($printing as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->printing_type }}</td>
                    <td>{{ $item->printing_quantity }}</td>
                    <td>{{ $item->printing_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td> <!-- Formatting Date -->
                    <td>
                        <form method="post" action="{{ route('print.destroy', $item->id) }}">
                            <a href="{{ route('print.edit', $item->id) }}"> 
                                <i class="fa-solid fa-edit text-success"></i> 
                            </a>
                            <a href="{{ route('print.show', $item->id) }}"> 
                                <i class="fa-solid fa-eye text-info"></i> 
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-0"> 
                                <i class="fa-solid fa-trash text-danger"></i>
                            </button>
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
        {{ $printing->links() }}
    </div>
</div>

@endsection
