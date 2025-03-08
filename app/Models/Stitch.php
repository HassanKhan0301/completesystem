<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stitch extends Model
{
    use HasFactory;
    protected $table = 'stitches';
    protected $guarded = [];
}
