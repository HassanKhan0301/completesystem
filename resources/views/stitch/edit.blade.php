@extends('dashboard.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Stitching</h2>

    <form id="buyingForm" method="POST" action="{{ route('stitch.update', $stitchingOrder->id) }}">
        @csrf
        @method('PUT')

        <!-- Order ID -->
        <div class="mb-3">
            <label for="orderId" class="form-label">Order ID</label>
            <input type="text" class="form-control" id="orderId" name="orderId" value="{{ $stitchingOrder->orderId }}" required>
        </div>

        <!-- Date -->
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $stitchingOrder->date }}" required>
        </div>

        <!-- Add Row Button -->
        <button id="addRow" class="btn btn-primary mb-3">Add Row</button>

        <!-- Table -->
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Stitching Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stitchingMaterials as $index => $stitch)
                    <tr id="row{{ $index }}">
                        <td>{{ $index + 1 }}</td>
                        <td><input type="text" class="form-control" name="stitching_type[]" value="{{ $stitch->stitching_type }}" required></td>
                        <td><input type="number" class="form-control quantity" name="stitching_quantity[]" value="{{ $stitch->stitching_quantity }}" min="1"></td>
                        <td><input type="number" class="form-control price" name="stitching_price[]" value="{{ $stitch->stitching_price }}" min="0" step="0.01"></td>
                        <td><input type="number" class="form-control total" name="total[]" value="{{ $stitch->total_amount }}" readonly></td>
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
                        <td><input type="text" class="form-control" name="stitching_type[]" placeholder="Enter Stitching Type" required></td>
                        <td><input type="number" class="form-control quantity" name="stitching_quantity[]" placeholder="Enter Quantity" min="1" value="1"></td>
                        <td><input type="number" class="form-control price" name="stitching_price[]" placeholder="Enter Price" min="0" step="0.01" value="0"></td>
                        <td><input type="number" class="form-control total" name="total[]" placeholder="Total Amount" readonly></td>
                        <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                    </tr>`;

        $("#myTable tbody").append(newRow);
    });

    // Function to update total dynamically
    function updateTotal(row) {
        let quantity = parseFloat(row.find(".quantity").val()) || 0;
        let price = parseFloat(row.find(".price").val()) || 0;
        let total = (quantity * price).toFixed(2);
        row.find(".total").val(total);
    }

    // Trigger update when quantity or price changes
    $(document).on("input", ".quantity, .price", function() {
        let row = $(this).closest('tr');
        updateTotal(row);
    });

    // Ensure total is updated when the form is submitted
    $("form").submit(function() {
        $("#myTable tbody tr").each(function() {
            updateTotal($(this));
        });
    });

    // Delete row
    $(document).on("click", ".deleteRow", function() {
        $(this).closest('tr').remove();
    });

    // Ensure all existing rows have their total calculated initially
    $("#myTable tbody tr").each(function() {
        updateTotal($(this));
    });
});

</script>

@endsection
