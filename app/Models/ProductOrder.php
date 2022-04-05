<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'order_id', 'quantity'];
    
    public function products() {
        return $this->hasMany(Product::class,'id','product_id');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
