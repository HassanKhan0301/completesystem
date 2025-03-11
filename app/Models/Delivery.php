<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliverys';
    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime', // This tells Laravel to treat 'date' as a Carbon instance
    ];
}
