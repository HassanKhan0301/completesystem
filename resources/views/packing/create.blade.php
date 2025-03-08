@extends('dashboard.layout.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buying Table with Add Row Functionality</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Cutting</h2>

    <!-- Form for submitting the data -->
    <form id="buyingForm" method="POST" action="{{ route('packing.store') }}">
      @csrf <!-- CSRF Token for security, make sure to include this in your form -->

      <!-- Add Order ID (if needed) -->
      <div class="mb-3">
        <label for="orderId" class="form-label">Order ID</label>
        <input type="hidden" class="form-control" id="orderId" name="orderId" value="{{ $orderId }}" required>
      </div>

      <!-- Add Row Button -->
      <button id="addRow" class="btn btn-primary mb-3">Add Row</button>

      <!-- Table -->
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Type</th>
            <th>Quantity</th>

            <th>Price</th>
            <th>Total Amount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be added here -->
        </tbody>
      </table>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
  </div>

  <!-- jQuery Script to add rows -->
  <script>
    $(document).ready(function() {
      let rowCount = 0; // Initial row count

      // Add row on button click
      $("#addRow").click(function(event) {
    event.preventDefault(); // Prevents the page from refreshing

    rowCount++; // Increment row count for unique id

    let newRow = `<tr id="row${rowCount}">
                    <td>${rowCount}</td>
                    <td><input type="text" class="form-control material" name="packing_type[]" placeholder="Enter Material"></td>
                    <td><input type="number" class="form-control quantity" name="packing_quantity[]" placeholder="Enter Quantity" min="1"></td>
                    <td><input type="number" class="form-control price" name="packing_price[]" placeholder="Enter Price" min="0" step="0.01"></td>
                    <td><input type="number" class="form-control total" name="total[]" placeholder="Total Amount" readonly></td>
                    <td><button class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                  </tr>`;

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

  <!-- Bootstrap JS (optional, but recommended for components like tooltips, etc.) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
