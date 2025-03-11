<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;

class DeliveryController extends Controller
{
    public function index(Request $request)
{
    // Get the search query for delivery_type
    $search = $request->get('search'); 

    // Filter the delivery records based on the search query
    if ($search) {
        $delivery = Delivery::where('delivery_type', 'like', '%' . $search . '%')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(25);
    } else {
        $delivery = Delivery::orderBy('created_at', 'DESC')->paginate(25);
    }

    return view('delivery.index', compact('delivery'));
}

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('delivery.create', compact('orderId'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'orderId' => 'required|string',
            'delivery_type' => 'required|array',
            'delivery_quantity' => 'required|array',
            'delivery_price' => 'required|array',
            'total' => 'required|array',
            'date' => 'required|date',
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->delivery_type as $key => $type) {
            Delivery::create([
                'orderId' => $request->orderId,
                'delivery_type' => $type,
                'delivery_quantity' => $request->delivery_quantity[$key] ?? 0,
                'delivery_price' => $request->delivery_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
                'date' => $request->date,
            ]);
        }

        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        $deliveryOrder = Delivery::find($id);
    
        if (!$deliveryOrder) {
            return redirect()->route('delivery.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all records with the same orderId
        $deliveryMaterials = Delivery::where('orderId', $deliveryOrder->orderId)->get();
    
        return view('delivery.edit', compact('deliveryOrder', 'deliveryMaterials'));
    }

    
    public function update(Request $request, $id)
    {
        // Find the order by ID
        $deliveryOrder = Delivery::find($id);
    
        if (!$deliveryOrder) {
            return redirect()->route('delivery.index')->with('error', 'Delivery order not found.');
        }
    
        // Update the date
        $deliveryOrder->date = $request->date;
        $deliveryOrder->save();
    
        // Delete existing materials for this order (but keep the same orderId)
        Delivery::where('orderId', $deliveryOrder->orderId)->delete();
    
        // Insert new records for each delivery type
        foreach ($request->delivery_type as $index => $delivery_type) {
            $newDelivery = new Delivery();
            $newDelivery->orderId = $request->orderId;
            $newDelivery->delivery_type = $delivery_type;
            $newDelivery->delivery_quantity = $request->delivery_quantity[$index];
            $newDelivery->delivery_price = $request->delivery_price[$index];
            $newDelivery->total_amount = $request->delivery_quantity[$index] * $request->delivery_price[$index]; // Calculating total amount
            $newDelivery->date = $request->date; // Ensure date is also updated
            $newDelivery->save();
        }
    
        return redirect()->route('delivery.index')->with('success', 'Delivery order updated successfully.');
    }
    
    public function show($id)
    {
        // Find the delivery record by ID
        $delivery = Delivery::find($id);
    
        // Check if the delivery record exists
        if (!$delivery) {
            return redirect()->route('delivery.index')->with('error', 'Delivery record not found.');
        }
    
        // Pass the delivery object to the view
        return view('delivery.show', compact('delivery'));
    }
    

    public function destroy(string $id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        return redirect('delivery');
    }
    
}
