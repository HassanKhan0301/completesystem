<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();  
        return view('product.index', compact('product'));
    }
    
    public function create()
    {
        $orders = Order::get();
        return view('product.create', compact('orders'));
    }
    
    public function store(Request $request)
    {
        Log::debug('Request data: ', $request->all());
        
        
        $request->validate([
            'vendor' => 'required|string|max:255',
            'Article' => 'required|string|max:255',
            'Raw_Material' => 'required|string|max:255',
            'cutting_type' => 'required|string|max:255',
            'cutting_price' => 'required|numeric',
            'cutting_quantity' => 'required|numeric',
            'printing_type' => 'required|string|max:255',
            'printing_price' => 'required|numeric',
            'printing_quantity' => 'required|numeric',
            'stitching_type' => 'required|string|max:255',
            'stitching_price' => 'required|numeric',
            'quantity_stitching' => 'required|numeric',
            'cropping_type' => 'required|string|max:255',
            'cropping_price' => 'required|numeric',
            'quantity_cropping' => 'required|numeric',
            'packing_type' => 'required|string|max:255',
            'packing_price' => 'required|numeric',
            'Delivery_type' => 'required|string|max:255',
            'Delevery_price' => 'required|numeric',
            'quantyty_delevery' => 'required|numeric',
        ]);
        
        
        $product = new Product();
        $product->vendor = $request->vendor; 
        $product->Article = $request->Article; 
        $product->Raw_Material = $request->Raw_Material;
        $product->cutting_type = $request->cutting_type;
        $product->cutting_price = $request->cutting_price;
        $product->cutting_quantity = $request->cutting_quantity;
        $product->printing_type = $request->printing_type;
        $product->printing_price = $request->printing_price;
        $product->printing_quantity = $request->printing_quantity;
        $product->stitching_type = $request->stitching_type;
        $product->stitching_price = $request->stitching_price;
        $product->quantity_stitching = $request->quantity_stitching;
        $product->cropping_type = $request->cropping_type;
        $product->cropping_price = $request->cropping_price;
        $product->quantity_cropping = $request->quantity_cropping;
        $product->packing_type = $request->packing_type;
        $product->packing_price = $request->packing_price;
        $product->Delivery_type = $request->Delivery_type;
        $product->Delevery_price = $request->Delevery_price;
        $product->quantyty_delevery = $request->quantyty_delevery;
        
        // Save to database
        $product->save();
        
        return redirect()->route('product.index')->with('success', 'Order created successfully');
    }
    
    
    
    public function edit($id)
    {
        
        $product = Product::find($id);
        
        $vendors = Order::select('vendor_name')->distinct()->get();
        $articles = Order::select('Article_name')->distinct()->get();
        
        // Pass them to the view
        return view('product.edit', compact('product','vendors', 'articles'));
        
        
    }
    
    public function update(Request $request,$id)
    
    
    {
        Log::debug('Request data for update: ', $request->all());
        
        
        $request->validate([
            'vendor' => 'required|string|max:255',
            'Article' => 'required|string|max:255',
            'Raw_Material' => 'required|string|max:255',
            'cutting_type' => 'required|string|max:255',
            'cutting_price' => 'required|numeric',
            'cutting_quantity' => 'required|numeric',
            'printing_type' => 'required|string|max:255',
            'printing_price' => 'required|numeric',
            'printing_quantity' => 'required|numeric',
            'stitching_type' => 'required|string|max:255',
            'stitching_price' => 'required|numeric',
            'quantity_stitching' => 'required|numeric',
            'cropping_type' => 'required|string|max:255',
            'cropping_price' => 'required|numeric',
            'quantity_cropping' => 'required|numeric',
            'packing_type' => 'required|string|max:255',
            'packing_price' => 'required|numeric',
            'Delivery_type' => 'required|string|max:255',
            'Delevery_price' => 'required|numeric',
            'quantyty_delevery' => 'required|numeric',
        ]);
        
        
        $product = Product::find($id);
        $product->vendor = $request->vendor;
        $product->Article = $request->Article;
        $product->Raw_Material = $request->Raw_Material;
        $product->cutting_type = $request->cutting_type;
        $product->cutting_price = $request->cutting_price;
        $product->cutting_quantity = $request->cutting_quantity;
        $product->printing_type = $request->printing_type;
        $product->printing_price = $request->printing_price;
        $product->printing_quantity = $request->printing_quantity;
        $product->stitching_type = $request->stitching_type;
        $product->stitching_price = $request->stitching_price;
        $product->quantity_stitching = $request->quantity_stitching;
        $product->cropping_type = $request->cropping_type;
        $product->cropping_price = $request->cropping_price;
        $product->quantity_cropping = $request->quantity_cropping;
        $product->packing_type = $request->packing_type;
        $product->packing_price = $request->packing_price;
        $product->Delivery_type = $request->Delivery_type;
        $product->Delevery_price = $request->Delevery_price;
        $product->quantyty_delevery = $request->quantyty_delevery;
        
        
        $product->save();
        
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }
    
    public function show($id)
    {
        
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
    
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product');
    }
    
}












