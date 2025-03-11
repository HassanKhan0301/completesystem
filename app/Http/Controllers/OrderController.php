<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Buying;
use App\Models\Cutting;
use App\Models\Stitch;
use App\Models\Printt;
use App\Models\Packing;
use App\Models\Crop;
use App\Models\Delivery;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    public function generateInvoice($orderId)
{
    // Retrieve the order by ID
    $order = Order::findOrFail($orderId);

    // Generate the PDF with the specified fields
    $pdf = PDF::loadView('order.invoice', compact('order'));

    // Return the generated PDF
    return $pdf->download('invoice_' . $order->id . '.pdf');
}

    public function generateBill($id)
    {
        $order = Order::findOrFail($id);
        $buying = Buying::where('orderId', $id)->get();
        $cutting = Cutting::where('orderId', $id)->get();
        $stitching = Stitch::where('orderId', $id)->get();
        $printing = Printt::where('orderId', $id)->get();
        $cropping = Crop::where('orderId', $id)->get();
        $packing = Packing::where('orderId', $id)->get();
        $delivery = Delivery::where('orderId', $id)->get();

        $pdf = Pdf::loadView('pdf.invoice', compact('order', 'buying', 'cutting', 'stitching', 'printing' , 'cropping' , 'packing', 'delivery'));

        return $pdf->download('invoice_' . $order->id . '.pdf');
    }

    
    public function index(Request $request)
    {
        // Check if search query is passed, then filter by vendor_name
        $query = Order::orderBy('created_at', 'DESC');
        
        if ($request->has('search') && !empty($request->search)) {
            $query->where('vendor_name', 'like', '%' . $request->search . '%');
        }
    
        // Paginate the results
        $order = $query->paginate(25);
    
        // Return the view with the filtered orders
        return view('order.index', compact('order'));
    }
    
    public function create()
    {
        return view('order.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'to' => 'required',
        'vendor_name' => 'required',
        'Article_number' => 'required',
        'Article_name' => 'required',
        'quantity' => 'required',
        'delivery_date' => 'required',
        'unit_price' => 'required|numeric',
        'status' => 'nullable|in:complete,incomplete', 
    ]);

   
    $status = $request->status ?? 'incomplete';
    $subtotal = $request->unit_price * $request->quantity;

    Order::create([
        'to' => $request->to,
        'vendor_name' => $request->vendor_name,
        'Article_number' => $request->Article_number,
        'Article_name' => $request->Article_name,
        'quantity' => $request->quantity,
        'delivery_date' => $request->delivery_date,
        'unit_price' => $request->unit_price,
        'subtotal' => $subtotal,
        'status' => $status, 
    ]);

    return redirect()->route('order.index')->with('success', 'Order created successfully');
}

public function edit(string $id)
    {
        $order = Order::find($id);
        return view('order.edit',compact('order'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'to' => 'required|string',            
            'vendor_name' => 'required|string', 
            'Article_number' => 'nullable|integer',  
            'Article_name' => 'nullable|string',    
            'quantity' => 'nullable|integer',        
            'delivery_date' => 'nullable|date', 
            'unit_price' => 'required|numeric',
            'status' => 'nullable|in:complete,incomplete',  
        ]);
    
        $order = Order::findOrFail($id);
    
        // Ensure quantity is not null before calculation
        $subtotal = ($request->quantity ?? $order->quantity) * $request->unit_price;
    
        $order->update([
            'to' => $request->to,                  
            'vendor_name' => $request->vendor_name,  
            'Article_number' => $request->Article_number, 
            'Article_name' => $request->Article_name, 
            'quantity' => $request->quantity ?? $order->quantity,      
            'delivery_date' => $request->delivery_date,  
            'unit_price' => $request->unit_price,
            'subtotal' => $subtotal,
            'status' => $request->status ?? $order->status,          
        ]);
    
        return redirect()->route('order.index')->with('success', 'Order updated successfully!');
    }
    

    public function show($id)
{
    
    $order = Order::findOrFail($id);
    return view('order.show', compact('order'));
}

    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('order');
    }


}

