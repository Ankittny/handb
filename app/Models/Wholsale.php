<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wholsale extends Model
{
    use HasFactory;
    protected $table = 'wholesale_prices';
    protected $fillable = [
        'product_id',
        'wholesale_price',
        'min_qty',
        'max_qty',
    ];
}
