@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Stitching List</h2>

    <!-- Add Buying Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Stitching</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('stitch.create') }}">Add Stitching</a>
    </div>

    <!-- Buying Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Stitching Type</th>
                <th>Stitching Quantity</th>
                <th>Stitching Price</th>
                <th>Total Amount</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stitching as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->stitching_type }}</td>
                    <td>{{ $item->stitching_quantity }}</td>
              
                    <td>{{ $item->stitching_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                   
                    <td>
                        <!-- Edit Button -->
                       

                        <!-- Delete Button (if you want to allow deleting, you can implement it too) -->
                        <form method="post" action="{{ route('stitch.destroy', $item->id) }}">
                            <a href="{{ route('stitch.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('stitch.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
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
        {{ $stitching->links() }}
    </div>
</div>



@endsection

