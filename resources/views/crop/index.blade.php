@extends('dashboard.layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Cropping List</h2>

    <!-- Add Buying Button -->
    <div class="d-flex justify-content-between mb-4">
        <h4>
            <span class="text-muted fw-light">Cropping</span>
        </h4>
        <a class="btn btn-primary" href="{{ route('crop.create') }}">Add Cropping</a>
    </div>

    <!-- Buying Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Cropping Type</th>
                <th>Cropping Quantity</th>
                <th>Cropping Price</th>
                <th>Total Amount</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cropping as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->orderId }}</td>
                    <td>{{ $item->cropping_type }}</td>
                    <td>{{ $item->cropping_quantity }}</td>
              
                    <td>{{ $item->cropping_price }}</td>
                    <td>{{ $item->total_amount }}</td>
                   
                    <td>
                        <!-- Edit Button -->
                       

                        <!-- Delete Button (if you want to allow deleting, you can implement it too) -->
                        <form method="post" action="{{ route('crop.destroy', $item->id) }}">
                            <a href="{{ route('crop.edit', $item->id) }}"> <i class="fa-solid fa-edit text-success"></i> </a>
                            <a href="{{ route('crop.show', $item->id) }}"> <i class="fa-solid fa-eye text-info"></i> </a>
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
        {{ $cropping->links() }}
    </div>
</div>



@endsection

