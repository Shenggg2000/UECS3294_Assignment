<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
      }

}
