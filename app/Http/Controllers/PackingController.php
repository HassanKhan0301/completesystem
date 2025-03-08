<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packing;
use App\Models\Order;

class PackingController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $packing = Packing::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
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
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->packing_type as $key => $type) {
            Packing::create([
                'orderId' => $request->orderId,
                'packing_type' => $type,
                'packing_quantity' => $request->packing_quantity[$key] ?? 0,
                'packing_price' => $request->packing_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
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
        // Find the order by ID
        $packingOrder = Packing::find($id);
    
        if (!$packingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Packing::where('orderId', $packingOrder->orderId)->delete();
    
        // Insert new records for each stitching type
        foreach ($request->packing_type as $index => $packing_type) {
            $newStitch = new Packing();
            $newStitch->orderId = $request->orderId;
            $newStitch->packing_type = $packing_type;
            $newStitch->packing_quantity = $request->packing_quantity[$index];
            $newStitch->packing_price = $request->packing_price[$index];
            $newStitch->total_amount = $request->total[$index];
            $newStitch->save();
        }
    
        return redirect()->route('packing.index')->with('success', 'Stitching order updated successfully.');
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
