<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printt;
use App\Models\Order;

class PrintController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $printing = Printt::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
        } else {
            $printing = Printt::orderBy('created_at', 'DESC')->paginate(25);
        }
    
        return view('print.index', compact('printing'));
    }

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('print.create', compact('orderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderId' => 'required|string',
            'printing_type' => 'required|array',
            'printing_quantity' => 'required|array',
            'printing_price' => 'required|array',
            'total' => 'required|array',
        ]);

        foreach ($request->printing_type as $key => $type) {
            Printt::create([
                'orderId' => $request->orderId,
                'printing_type' => $type,
                'printing_quantity' => $request->printing_quantity[$key] ?? 0,
                'printing_price' => $request->printing_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,

                
                
            ]);
        }

        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        $printingOrder = Printt::find($id);
    
        if (!$printingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all records with the same orderId
        $printingMaterials = Printt::where('orderId', $printingOrder->orderId)->get();
    
        return view('print.edit', compact('printingOrder', 'printingMaterials'));
    }

    public function update(Request $request, $id)
    {
        // Find the order by ID
        $printingOrder = Printt::find($id);
    
        if (!$printingOrder) {
            return redirect()->route('print.index')->with('error', 'Stitching record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Printt::where('orderId', $printingOrder->orderId)->delete();
    
        // Insert new records for each stitching type
        foreach ($request->printing_type as $index => $printing_type) {
            $newStitch = new Printt();
            $newStitch->orderId = $request->orderId;
            $newStitch->printing_type = $printing_type;
            $newStitch->printing_quantity = $request->printing_quantity[$index];
            $newStitch->printing_price = $request->printing_price[$index];
            $newStitch->total_amount = $request->total[$index];
            $newStitch->save();
        }
    
        return redirect()->route('print.index')->with('success', 'Stitching order updated successfully.');
    }

    public function show($id)
{
    // Find the printing order by ID
    $printingOrder = Printt::find($id);

    if (!$printingOrder) {
        return redirect()->route('print.index')->with('error', 'Printing record not found.');
    }

    // Retrieve all printing records with the same orderId
    $printingMaterials = Printt::where('orderId', $printingOrder->orderId)->get();

    // Pass both the single printing order and all related printing records to the view
    return view('print.show', compact('printingOrder', 'printingMaterials'));
}



    public function destroy(string $id)
    {
        $print = Printt::find($id);
        $print->delete();
        return redirect('print');
    }
    
   


}
