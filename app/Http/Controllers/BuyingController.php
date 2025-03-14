<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buying;
use App\Models\Order;

class BuyingController extends Controller
{
    public function index(Request $request)
{
    $orderId = $request->orderId; // Get orderId from URL
    $search = $request->get('search'); // Get the search query

    if ($orderId) {
        // If orderId is present, filter by orderId
        if ($search) {
            // If search term is present, filter by material
            $buying = Buying::where('orderId', $orderId)
                            ->where('material', 'like', '%' . $search . '%')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(25);
        } else {
            $buying = Buying::where('orderId', $orderId)->orderBy('created_at', 'DESC')->paginate(25);
        }
    } else {
        // If no orderId, apply the search globally
        if ($search) {
            $buying = Buying::where('material', 'like', '%' . $search . '%')->orderBy('created_at', 'DESC')->paginate(25);
        } else {
            $buying = Buying::orderBy('created_at', 'DESC')->paginate(25);
        }
    }

    return view('buying.index', compact('buying', 'search'));
}

    

    public function create(Request $request)
    {
        $orderId = $request->orderId; // Get orderId from URL
        return view('buying.create', compact('orderId'));
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'orderId' => 'required|string',
            'material' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
            'unit' => 'required|array',
            'total' => 'required|array',
            'date' => 'required|date', // Validate date field
        ]);

        // Loop through the submitted cutting details and store them
        foreach ($request->material as $key => $material) {
            Buying::create([
                'orderId' => $request->orderId,
                'material' => $material,
                'unit' => $request->unit[$key] ?? 0, // Fix this
                'price' => $request->price[$key] ?? 0.00, // Fix this
                'quantity' => $request->quantity[$key] ?? 0, // Fix this
                'total_amount' => $request->total[$key] ?? 0.00, // Fix this
                'date' => $request->date, // Store the date field
            ]);
        }
        return redirect()->route('order.show', ['orderId' => $request->orderId])
        ->with('success', 'Buying data saved successfully');
    
        
    }

    public function edit($id)
    {
        // Find all materials for the given orderId
        $buyingOrder = Buying::find($id);
    
        if (!$buyingOrder) {
            return redirect()->route('buying.index')->with('error', 'Buying record not found.');
        }
    
        $buyingMaterials = Buying::where('orderId', $buyingOrder->orderId)->get();
    
        return view('buying.edit', compact('buyingOrder', 'buyingMaterials'));
    }
    
    public function update(Request $request, $id)
    {
        // Find the order by ID
        $buyingOrder = Buying::find($id);
        
        if (!$buyingOrder) {
            return redirect()->route('buying.index')->with('error', 'Buying record not found.');
        }
    
        // Delete existing materials for this order (but keep the same orderId)
        Buying::where('orderId', $buyingOrder->orderId)->delete();
    
        // Insert new records for each material
        foreach ($request->material as $index => $material) {
            $newBuying = new Buying();
            $newBuying->orderId = $request->orderId;
            $newBuying->material = $material;
            $newBuying->unit = $request->unit[$index];
            $newBuying->price = $request->price[$index];
            $newBuying->quantity = $request->quantity[$index];
    
            // Calculate total amount dynamically
            $newBuying->total_amount = $request->quantity[$index] * $request->price[$index];
    
            // Add the date
            $newBuying->date = $request->date;
    
            $newBuying->save();
        }
    
        return redirect()->route('buying.index')->with('success', 'Buying data updated successfully.');
    }
        
    
    public function destroy(string $id)
    {
        $buying = Buying::find($id);
        $buying->delete();
        return redirect('buying');
    }
    
    public function show($id)
    {
        $buying = Buying::find($id);
        $order = Order::find($buying->orderId); // Fetch the associated order
    
        return view('buying.show', compact('buying', 'order'));
    }
    

    
    

    
    
    






    }



