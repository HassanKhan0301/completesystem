<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .title { text-align: center; font-size: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Invoice - Order #{{ $order->id }}</h2>
        <p><strong>Vendor:</strong> {{ $order->vendor_name }}</p>
        <p><strong>Delivery Date:</strong> {{ $order->delivery_date }}</p>

        <h3>Buying Details</h3>
        <table>
            <tr>
                <th>Material</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($buying as $item)
            <tr>
                <td>{{ $item->material }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->total_amount }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Cutting Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($cutting as $cut)
            <tr>
                <td>{{ $cut->cutting_type }}</td>
                <td>{{ $cut->cutting_quantity }}</td>
                <td>{{ $cut->cutting_price }}</td>
                <td>{{ $cut->total_amount }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Stitching Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($stitching as $stitch)
            <tr>
                <td>{{ $stitch->stitching_type }}</td>
                <td>{{ $stitch->stitching_quantity }}</td>
                <td>{{ $stitch->stitching_price }}</td>
                <td>{{ $stitch->total_amount }}</td>
            </tr>
            @endforeach
        </table>
         <h3>Printing Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($printing as $print)
            <tr>
                <td>{{ $print->printing_type }}</td>
                <td>{{ $print->printiing_quantity }}</td>
                <td>{{ $print->printing_price }}</td>
                <td>{{ $print->total_amount }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Cropping Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($cropping as $crop)
            <tr>
                <td>{{ $crop->cropping_type }}</td>
                <td>{{ $crop->cropping_quantity }}</td>
                <td>{{ $crop->cropping_price }}</td>
                <td>{{ $crop->total_amount }}</td>
            </tr>
            @endforeach
        </table>

       
        <h3>Packing Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($packing as $pack)
            <tr>
                <td>{{ $pack->packing_type }}</td>
                <td>{{ $pack->packing_quantity }}</td>
                <td>{{ $pack->packing_price }}</td>
                <td>{{ $pack->total_amount }}</td>
            </tr>
            @endforeach
        </table>

        <h3>Delivery Details</h3>
        <table>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach ($delivery as $deliver)
            <tr>
                <td>{{ $deliver->delivery_type }}</td>
                <td>{{ $deliver->delivery_quantity }}</td>
                <td>{{ $deliver->delivery_price }}</td>
                <td>{{ $deliver->total_amount }}</td>
            </tr>
            @endforeach
        </table>




<h3>Grand Total: {{ 
    array_sum([
        (float) $buying->sum('total_amount') ?? 0, 
        (float) $cutting->sum('total_amount') ?? 0, 
        (float) $stitching->sum('total_amount') ?? 0, 
        (float) $packing->sum('total_amount') ?? 0, 
        (float) $printing->sum('total_amount') ?? 0, 
        (float) $cropping->sum('total_amount') ?? 0, 
        (float) $delivery->sum('total_amount') ?? 0
    ])
}}</h3>


    </div>
</body>
</html>
