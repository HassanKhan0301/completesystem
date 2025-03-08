@extends('dashboard.layout.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Buying</h2>

    <!-- Form for submitting the data -->
    <form id="buyingForm" method="POST" action="{{ route('buying.update', $buyingOrder->id) }}">
        @csrf <!-- CSRF Token for security -->
        @method('PUT') <!-- Use PUT method to update -->

        <!-- Add Order ID -->
        <div class="mb-3">
            <label for="orderId" class="form-label">Order ID</label>
            <input type="text" class="form-control" id="orderId" name="orderId" value="{{ $buyingOrder->orderId }}" required>
        </div>

        <!-- Add Row Button -->
        <button id="addRow" class="btn btn-primary mb-3">Add Row</button>

        <!-- Table -->
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buyingMaterials as $index => $buying)
                    <tr id="row{{ $index }}">
                        <td>{{ $index + 1 }}</td>
                        <td><input type="text" class="form-control material" name="material[]" value="{{ $buying->material }}"></td>
                        <td><input type="number" class="form-control quantity" name="quantity[]" value="{{ $buying->quantity }}" min="1"></td>
                        <td><input type="text" class="form-control unit" name="unit[]" value="{{ $buying->unit }}"></td>
                        <td><input type="number" class="form-control price" name="price[]" value="{{ $buying->price }}" min="0" step="0.01"></td>
                        <td><input type="number" class="form-control total" name="total[]" value="{{ $buying->total_amount }}" readonly></td>
                        <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>

<!-- jQuery Script to add rows -->
<script>
    $(document).ready(function() {
        let rowCount = {{ count($buyingMaterials ?? []) }};

        // Add row on button click
        $("#addRow").click(function(e) {
            e.preventDefault();
            rowCount++; // Increment row count for unique id

            // Create a new row with inputs for Material, Quantity, Unit, Price, and Total Amount
            let newRow = `<tr id="row${rowCount}">
                            <td>${rowCount}</td>
                            <td><input type="text" class="form-control material" name="material[]" placeholder="Enter Material"></td>
                            <td><input type="number" class="form-control quantity" name="quantity[]" placeholder="Enter Quantity" min="1"></td>
                            <td><input type="text" class="form-control unit" name="unit[]" placeholder="Enter Unit"></td>
                            <td><input type="number" class="form-control price" name="price[]" placeholder="Enter Price" min="0" step="0.01"></td>
                            <td><input type="number" class="form-control total" name="total[]" placeholder="Total Amount" readonly></td>
                            <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                        </tr>`;

            // Append the new row to the table body
            $("#myTable tbody").append(newRow);
        });

        // Calculate total amount when Quantity or Price changes
        $(document).on("input", ".quantity, .price", function() {
            let row = $(this).closest('tr');
            let quantity = parseFloat(row.find(".quantity").val()) || 0;
            let price = parseFloat(row.find(".price").val()) || 0;
            let total = (quantity * price).toFixed(2);
            
            // Set total in the Total Amount column
            row.find(".total").val(total);
        });

        // Delete row functionality
        $(document).on("click", ".deleteRow", function() {
            $(this).closest('tr').remove(); // Remove the row
        });
    });
</script>

@endsection
