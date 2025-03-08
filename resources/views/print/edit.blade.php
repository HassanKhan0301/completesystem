@extends('dashboard.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Stitching</h2>

    <form id="buyingForm" method="POST" action="{{ route('print.update', $printingOrder->id) }}">
        @csrf
        @method('PUT')

        <!-- Order ID -->
        <div class="mb-3">
            <label for="orderId" class="form-label">Order ID</label>
            <input type="text" class="form-control" id="orderId" name="orderId" value="{{ $printingOrder->orderId }}" required>
        </div>

        <!-- Add Row Button -->
        <button id="addRow" class="btn btn-primary mb-3">Add Row</button>

        <!-- Table -->
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th> Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($printingMaterials as $index => $print)
                    <tr id="row{{ $index }}">
                        <td>{{ $index + 1 }}</td>
                        <td><input type="text" class="form-control" name="printing_type[]" value="{{ $print->printing_type }}" required></td>
                        <td><input type="number" class="form-control quantity" name="printing_quantity[]" value="{{ $print->printing_quantity }}" min="1"></td>
                        <td><input type="number" class="form-control price" name="printing_price[]" value="{{ $print->printing_price }}" min="0" step="0.01"></td>
                        <td><input type="number" class="form-control total" name="total[]" value="{{ $print->total_amount }}" readonly></td>
                        <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        let rowCount = {{ count($stitchingMaterials ?? []) }};

        $("#addRow").click(function(e) {
            e.preventDefault();
            rowCount++;

            let newRow = `<tr id="row${rowCount}">
                            <td>${rowCount}</td>
                            <td><input type="text" class="form-control" name="printing_type[]" placeholder="Enter Stitching Type" required></td>
                            <td><input type="number" class="form-control quantity" name="printing_quantity[]" placeholder="Enter Quantity" min="1"></td>
                            <td><input type="number" class="form-control price" name="printing_price[]" placeholder="Enter Price" min="0" step="0.01"></td>
                            <td><input type="number" class="form-control total" name="total[]" placeholder="Total Amount" readonly></td>
                            <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                        </tr>`;

            $("#myTable tbody").append(newRow);
        });

        $(document).on("input", ".quantity, .price", function() {
            let row = $(this).closest('tr');
            let quantity = parseFloat(row.find(".quantity").val()) || 0;
            let price = parseFloat(row.find(".price").val()) || 0;
            let total = (quantity * price).toFixed(2);

            row.find(".total").val(total);
        });

        $(document).on("click", ".deleteRow", function() {
            $(this).closest('tr').remove();
        });
    });
</script>

@endsection
