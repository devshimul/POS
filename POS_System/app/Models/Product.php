<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 
    protected $fillable = ['product_code', 'product_name', 'product_stock', 'cost_price', 'sale_price', 'category_id', 'unit_id', 'supplier_id'];
    protected $table ="products";
}
