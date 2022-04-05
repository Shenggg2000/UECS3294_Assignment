<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class userGroceryController extends Controller
{
  use AuthenticatesUsers;

  
    public function groceries(Request $request)
    {
      if($request->category == 'all')
      {
        $products = Product::paginate(8);
      }
      else
      {
        $categoryOfProducts = ProductCategory::where('name', $request->category)->first();
        $products = Product::where('product_category_id', $categoryOfProducts->id)->paginate(8);
      }
      return view('groceries',compact('products'));
    }
  
    public function productDetail(Request $request) {
  
      $product = Product::with('product_category')
                  ->where('id', $request->product_id)->first();
      return view('productDetail',compact('product'));
    }
}
