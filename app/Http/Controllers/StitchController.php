<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stitch;
use App\Models\Printt;
use App\Models\Order;

class StitchController extends Controller
{
    public function index(Request $request)
{
    $stitchingType = $request->stitching_type; // Get stitching_type from URL
    
    if ($stitchingType) {
        // If stitching_type is provided, filter records by it
        $stitching = Stitch::where('stitching_type', 'like', "%$stitchingType%")
                           ->orderBy('created_at', 'DESC')
                           ->paginate(25);
    } else {
        // If no search term, fetch all records
        $stitching = Stitch::orderBy('created_at', 'DESC')->paginate(25);
    }

    return view('stitch.index', compact('stitching'));
}

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('stitch.create', compact('orderId'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'orderId' => 'required|string',
            'stitching_type' => 'required|array',
            'stitching_quantity' => 'required|array',
            'stitching_price' => 'required|array',
            'total' => 'required|array',
            'date' => 'required|date',
        ]);

        foreach ($request->stitching_type as $key => $type) {
            Stitch::create([
                'orderId' => $request->orderId,
                'stitching_type' => $type,
                'stitching_quantity' => $request->stitching_quantity[$key] ?? 0,
                'stitching_price' => $request->stitching_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,
                'date' => $request->date, // Store the date field


                
                
            ]);
        }

        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        $stitchingOrder = Stitch::find($id);
    
        if (!$stitchingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all records with the same orderId
        $stitchingMaterials = Stitch::where('orderId', $stitchingOrder->orderId)->get();
    
        return view('stitch.edit', compact('stitchingOrder', 'stitchingMaterials'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'orderId' => 'required|string',
            'stitching_type' => 'required|array',
            'stitching_quantity' => 'required|array',
            'stitching_price' => 'required|array',
            'date' => 'required|date',
        ]);
    
        // Find existing order
        $stitchingOrder = Stitch::find($id);
    
        if (!$stitchingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Remove old records related to the same orderId
        Stitch::where('orderId', $stitchingOrder->orderId)->delete();
    
        // Insert updated records
        foreach ($request->stitching_type as $index => $stitching_type) {
            $quantity = $request->stitching_quantity[$index] ?? 0;
            $price = $request->stitching_price[$index] ?? 0.00;
            $total = $quantity * $price; // Ensure correct calculation
    
            Stitch::create([
                'orderId' => $request->orderId,
                'stitching_type' => $stitching_type,
                'stitching_quantity' => $quantity,
                'stitching_price' => $price,
                'total_amount' => $total, // Corrected total calculation
                'date' => $request->date,
            ]);
        }
    
        return redirect()->route('stitch.index')->with('success', 'Stitching order updated successfully.');
    }
    

    public function show($id)
    {
        $stitchingOrder = Stitch::find($id);
    
        if (!$stitchingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all stitching records with the same orderId
        $stitchingMaterials = Stitch::where('orderId', $stitchingOrder->orderId)->get();
    
        // Retrieve the associated order (for the buttons)
        $order = Order::find($stitchingOrder->orderId); 
    
        return view('stitch.show', compact('stitchingOrder', 'stitchingMaterials', 'order'));
    }
    
    

    public function destroy(string $id)
    {
        $stitching = Stitch::find($id);
        $stitching->delete();
        return redirect('stitch');
    }
   



    }

