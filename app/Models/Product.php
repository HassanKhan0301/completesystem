<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderId', 'Raw_Material', 'cutting_type', 'cutting_price', 'cutting_quantity', 
        'printing_type', 'printing_price', 'printing_quantity', 'stitching_type', 'stitching_price', 
        'quantity_stitching', 'cropping_type', 'cropping_price', 'quantity_cropping', 'packing_type', 
        'packing_price', 'Delivery_type', 'Delevery_price', 'quantyty_delevery', 'status'
    ];

}
