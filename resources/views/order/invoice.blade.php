<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Order #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px;
        }
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Invoice</h2>
        <p>Order #{{ $order->id }}</p>
    </div>

    <table class="table">
        <tr>
            <th>Date</th>
            <td>{{ $order->to }}</td>
        </tr>
        <tr>
            <th>Vendor Name</th>
            <td>{{ $order->vendor_name }}</td>
        </tr>
        <tr>
            <th>Article Number</th>
            <td>{{ $order->Article_number }}</td>
        </tr>
        <tr>
            <th>Article Name</th>
            <td>{{ $order->Article_name }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <th>Delivery Date</th>
            <td>{{ $order->delivery_date }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->status === 'complete' ? 'Complete' : 'Incomplete' }}</td>



        </tr>

        <!-- New Fields for Unit Price and Subtotal -->
        <tr>
            <th>Unit Price</th>
            <td>{{ $order->unit_price }}</td>
        </tr>
        <tr>
            <th>Subtotal</th>
            <td>{{ $order->subtotal }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Thank you for your order!</p>
    </div>
</div>

</body>
</html>
