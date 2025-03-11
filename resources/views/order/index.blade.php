@extends('dashboard.layout.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Add Orders</span>
        </h4>
        <a class="btn btn-primary q-1" href="{{ route('order.create') }}"> Add Orders</a>
    </div>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('order.index') }}" class="mb-4">
        <div class="d-flex justify-content-between">
            <input type="text" name="search" class="form-control" placeholder="Search by Vendor Name" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </div>
    </form>

    <table id="#example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Vendor Name</th>
                <th>Article Name</th>
                <th>Article Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->vendor_name }}</td>
                    <td>{{ $item->Article_name }}</td>
                    <td>{{ $item->Article_number }}</td>
                    <td>
                        @if($item->status === 'complete')
                            <span class="badge bg-success">Complete</span>
                        @else
                            <span class="badge bg-danger">Incomplete</span>
                        @endif
                    </td>
                    <td class="d-flex align-items-center gap-2">
                        <a href="{{ route('order.bill', $item->id) }}" class="text-primary">
                            <i class="fa-solid fa-file-arrow-down"></i>
                        </a>
                        <a href="{{ route('order.edit', $item->id) }}" class="text-success">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <a href="{{ route('order.show', $item->id) }}" class="text-info">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <form method="post" action="{{ route('order.destroy', $item->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn p-0 border-0 text-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $order->links() }}
</div>
@endsection
