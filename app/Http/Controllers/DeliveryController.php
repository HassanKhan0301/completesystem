<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $delivery = Delivery::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
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
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->delivery_type as $key => $type) {
            Delivery::create([
                'orderId' => $request->orderId,
                'delivery_type' => $type,
                'delivery_quantity' => $request->delivery_quantity[$key] ?? 0,
                'delivery_price' => $request->delivery_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
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
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Delivery::where('orderId', $deliveryOrder->orderId)->delete();
    
        // Insert new records for each stitching type
        foreach ($request->delivery_type as $index => $delivery_type) {
            $newStitch = new Delivery();
            $newStitch->orderId = $request->orderId;
            $newStitch->delivery_type = $delivery_type;
            $newStitch->delivery_quantity = $request->delivery_quantity[$index];
            $newStitch->delivery_price = $request->delivery_price[$index];
            $newStitch->total_amount = $request->total[$index];
            $newStitch->save();
        }
    
        return redirect()->route('delivery.index')->with('success', 'Stitching order updated successfully.');
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
