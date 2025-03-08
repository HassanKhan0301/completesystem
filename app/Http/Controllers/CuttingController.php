<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cutting;
use App\Models\Order;

class CuttingController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $cutting = Cutting::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
        } else {
            $cutting = Cutting::orderBy('created_at', 'DESC')->paginate(25);
        }
    
        return view('cutting.index', compact('cutting'));
    }

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('cutting.create', compact('orderId'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'orderId' => 'required|string',
            'cutting_type' => 'required|array',
            'cutting_quantity' => 'required|array',
            'cutting_price' => 'required|array',
            'total' => 'required|array',
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->cutting_type as $key => $type) {
            Cutting::create([
                'orderId' => $request->orderId,
                'cutting_type' => $type,
                'cutting_quantity' => $request->cutting_quantity[$key] ?? 0,
                'cutting_price' => $request->cutting_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
            ]);
        }
        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        // Find the first record with the given ID
        $cuttingOrder = Cutting::find($id);
    
        if (!$cuttingOrder) {
            return redirect()->route('cutting.index')->with('error', 'Cutting record not found.');
        }
    
        // Get all records with the same orderId
        $cuttingMaterials = Cutting::where('orderId', $cuttingOrder->orderId)->get();
    
        return view('cutting.edit', compact('cuttingOrder', 'cuttingMaterials'));
    }
    

    public function update(Request $request, $id)
    {
        // Find the order by ID
        $cuttingOrder = Cutting::find($id);
    
        if (!$cuttingOrder) {
            return redirect()->route('cutting.index')->with('error', 'Stitching record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Cutting::where('orderId', $cuttingOrder->orderId)->delete();
    
        // Insert new records for each stitching type
        foreach ($request->cutting_type as $index => $cutting_type) {
            $newStitch = new Cutting();
            $newStitch->orderId = $request->orderId;
            $newStitch->cutting_type = $cutting_type;
            $newStitch->cutting_quantity = $request->cutting_quantity[$index];
            $newStitch->cutting_price = $request->cutting_price[$index];
            $newStitch->total_amount = $request->total[$index];
            $newStitch->save();
        }
    
        return redirect()->route('cutting.index')->with('success', 'Stitching order updated successfully.');
    }

    public function show($id)
    {
        
        $cutting = Cutting::find($id);
        $order = Order::find($cutting->orderId); 
         return view('cutting.show', compact('cutting','order'));
    }

    public function destroy(string $id)
    {
        $cutting = Cutting::find($id);
        $cutting->delete();
        return redirect('cutting');
    }
    
}
