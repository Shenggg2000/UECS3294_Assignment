<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductOrder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'payment_method'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function products() {
      return $this->belongsToMany(Product::class, 'product_order', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function productOrders() {
      return $this->hasMany(ProductOrder::class);
  }
}
