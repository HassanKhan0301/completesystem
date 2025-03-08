<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;
use App\Models\Order;

class CroppingController extends Controller
{
    public function index(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
    
        if ($orderId) {
            $cropping = Crop::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
        } else {
            $cropping = Crop::orderBy('created_at', 'DESC')->paginate(25);
        }
    
        return view('crop.index', compact('cropping'));
    }

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('crop.create', compact('orderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderId' => 'required|string',
            'cropping_type' => 'required|array',
            'cropping_quantity' => 'required|array',
            'cropping_price' => 'required|array',
            'total' => 'required|array',
        ]);

        foreach ($request->cropping_type as $key => $type) {
            Crop::create([
                'orderId' => $request->orderId,
                'cropping_type' => $type,
                'cropping_quantity' => $request->cropping_quantity[$key] ?? 0,
                'cropping_price' => $request->cropping_price[$key] ?? 0.00,
                'total_amount' => $request->total[$key] ?? 0.00,

                
                
            ]);
        }
        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
    }

    public function edit($id)
    {
        $croppingOrder = Crop::find($id);
    
        if (!$croppingOrder) {
            return redirect()->route('crop.index')->with('error', 'Stitching record not found.');
        }
    
        // Retrieve all records with the same orderId
        $croppingMaterials = Crop::where('orderId', $croppingOrder->orderId)->get();
    
        return view('crop.edit', compact('croppingOrder', 'croppingMaterials'));
    }
    public function show($id)
    {
        $cropping = Crop::find($id);
    
        if (!$cropping) {
            return redirect()->route('crop.index')->with('error', 'Cropping record not found.');
        }

        // Retrieve the associated order details
        $order = Order::find($cropping->orderId);
    
        return view('crop.show', compact('cropping', 'order'));
    }
    
    public function destroy(string $id)
    {
        $crop = Crop::find($id);
        $crop->delete();
        return redirect('crop');
    }


}
