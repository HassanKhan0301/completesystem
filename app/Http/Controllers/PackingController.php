<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packing;
use App\Models\Order;

class PackingController extends Controller
{
    public function index(Request $request)
    {
        $packingType = $request->get('packing_type'); // Get search query
    
        if ($packingType) {
            $packing = Packing::where('packing_type', 'like', '%' . $packingType . '%')
                              ->orderBy('created_at', 'DESC')
                              ->paginate(25);
        } else {
            $packing = Packing::orderBy('created_at', 'DESC')->paginate(25);
        }
    
        return view('packing.index', compact('packing'));
    }
    
    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('packing.create', compact('orderId'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'orderId' => 'required|string',
            'packing_type' => 'required|array',
            'packing_quantity' => 'required|array',
            'packing_price' => 'required|array',
            'total' => 'required|array',
            'date' => 'required|date',
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->packing_type as $key => $type) {
            Packing::create([
                'orderId' => $request->orderId,
                'packing_type' => $type,
                'packing_quantity' => $request->packing_quantity[$key] ?? 0,
                'packing_price' => $request->packing_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
                'date' => $request->date, // Store the date field
            ]);
        }

        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        $packingOrder = Packing::find($id);
    
        if (!$packingOrder) {
            return redirect()->route('packing.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all records with the same orderId
        $packingMaterials = Packing::where('orderId', $packingOrder->orderId)->get();
    
        return view('packing.edit', compact('packingOrder', 'packingMaterials'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'orderId' => 'required|string',
            'packing_type' => 'required|array',
            'packing_quantity' => 'required|array',
            'packing_price' => 'required|array',
            'total' => 'required|array',
            'date' => 'required|date',
        ]);
    
        // Find the original order
        $packingOrder = Packing::find($id);
    
        if (!$packingOrder) {
            return redirect()->route('packing.index')->with('error', 'Packing record not found.');
        }
    
        // Delete existing materials for this orderId
        Packing::where('orderId', $packingOrder->orderId)->delete();
    
        // Insert updated records
        foreach ($request->packing_type as $index => $packing_type) {
            Packing::create([
                'orderId' => $request->orderId,
                'packing_type' => $packing_type,
                'packing_quantity' => $request->packing_quantity[$index],
                'packing_price' => $request->packing_price[$index],
                'total_amount' => $request->packing_quantity[$index] * $request->packing_price[$index], // Ensure total amount calculation
                'date' => $request->date, // Include date in update
            ]);
        }
    
        return redirect()->route('packing.index')->with('success', 'Packing order updated successfully.');
    }
    

    public function show($id)
    {
        $packing = Packing::find($id);

        if (!$packing) {
            return redirect()->route('packing.index')->with('error', 'Packing record not found.');
        }

        $order = Order::find($packing->orderId); // Fetch the associated order
        return view('packing.show', compact('packing', 'order'));
    }


    public function destroy(string $id)
    {
        $packing = Packing::find($id);
        $packing->delete();
        return redirect('packing');
    }
    

}
