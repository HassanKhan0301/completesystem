@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Cutting List</h2>

    <!-- Add Buying Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Cutting</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('cutting.create') }}">Add Cutting</a>
    </div>

    <!-- Buying Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Cutting Type</th>
                <th>Cutting Quantity</th>
         
                <th>Cutting Price</th>
                <th>Total Amount</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cutting as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->cutting_type }}</td>
                    <td>{{ $item->cutting_quantity }}</td>
              
                    <td>{{ $item->cutting_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                   
                    <td>
                        <!-- Edit Button -->
                       

                        <!-- Delete Button (if you want to allow deleting, you can implement it too) -->
                        <form method="post" action="{{ route('cutting.destroy', $item->id) }}">
                            <a href="{{ route('cutting.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('cutting.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
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
        {{ $cutting->links() }}
    </div>
</div>



@endsection

