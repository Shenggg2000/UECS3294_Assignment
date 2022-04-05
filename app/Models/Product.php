<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\ProductOrder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'SKU', 'category', 'price'];

    public function cart_items() {
      return $this->belongsTo(CartItem::class,'id','product_id');
    }

    public function orders() {
      return $this->hasMany(Order::class, 'product_order', 'product_id', 'order_id');
    }

    public function product_category() {
      return $this->belongsTo(ProductCategory::class);
    }
    
    public function product_order() {
      return $this->belongsTo(ProductCategory::class,'product_id','id');
    }
}
