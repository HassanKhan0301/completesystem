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
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $stitching = Stitch::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
        } else {
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
        ]);

        foreach ($request->stitching_type as $key => $type) {
            Stitch::create([
                'orderId' => $request->orderId,
                'stitching_type' => $type,
                'stitching_quantity' => $request->stitching_quantity[$key] ?? 0,
                'stitching_price' => $request->stitching_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,

                
                
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
    
        return redirect()->route('order.show', ['order' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    }
    
    public function update(Request $request, $id)
    {
        // Find the order by ID
        $stitchingOrder = Stitch::find($id);
    
        if (!$stitchingOrder) {
            return redirect()->route('stitch.index')->with('error', 'Stitching record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Stitch::where('orderId', $stitchingOrder->orderId)->delete();
    
        // Insert new records for each stitching type
        foreach ($request->stitching_type as $index => $stitching_type) {
            $newStitch = new Stitch();
            $newStitch->orderId = $request->orderId;
            $newStitch->stitching_type = $stitching_type;
            $newStitch->stitching_quantity = $request->stitching_quantity[$index];
            $newStitch->stitching_price = $request->stitching_price[$index];
            $newStitch->total_amount = $request->total[$index];
            $newStitch->save();
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

