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

class userCartController extends Controller
{
    public function cart() {
        if(Auth::id())
        {
          $user=auth()->user();
          $carts = DB::table('cart_items')
                ->join('products', 'cart_items.product_id', '=', 'products.id')
                ->where('user_id', $user->id)
                ->get();
          $carts = json_decode($carts, true);
        }
        else
        {
          $carts = session()->get('cart');
        }
    
        return view('cart',compact('carts'));
      }
    
    public function addcart(Request $request) {

      $product = Product::find($request->product_id);
            if(!$product) {
                abort(404);
        }
      if($product->stock > 0)
      {
        $inCart = CartItem::where('product_id', $request->product_id)
                  ->where('user_id', Auth::id())
                  ->first();

        if(Auth::id())
        {
          if(!$inCart)
          {
            $user=auth()->user();
            $cartItem = $request->all();
            $cartItem["user_id"]=$user->id;
            CartItem::create($cartItem);
          }
          elseif($inCart)
          {
            $inCart->update(['quantity' => $inCart->quantity +=1]);
          }
          $product->update(['stock' => $product->stock -=1]);
          return redirect()->back();
        }
        else
        {
          $id =$request->product_id;
          $sesCart = session()->get('cart');
          //new item
          if(!$sesCart) {
            $sesCart = [
              $id => [
                  "product_id" => $request->product_id,
                  "name" => $request->product_name,
                  "quantity" => $request->quantity,
                  "price" => $request->product_price,
              ]
            ];
            session()->put('cart', $sesCart);
          }
          //duplicated item
          elseif(isset($sesCart[$id])) {
            $sesCart[$id]['quantity']++;
            session()->put('cart', $sesCart);
          }
          
          //minus stock
          $product->update(['stock' => $product->stock -=1]);
          return redirect()->back();
        }
      }
    }

      public function addQuantity(Request $request) {
        $product = Product::find($request->product_id);
    
        if($product->stock > 0)
        {
          if(Auth::id())
          {
            $cart = CartItem::find($request->product_id);
      
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
          }
          else
          {
            if($request->product_id)
            {
                $cart = session()->get('cart');
                $cart[$request->product_id]["quantity"] ++;
                session()->put('cart', $cart);
            }
          }
          //minus stock
          $product->update(['stock' => $product->stock -=1]);
          return redirect()->intended('/cart');
        }
        else
        {
          return redirect()->back();
        }
      }
    
      public function minQuantity(Request $request) {
        $product = Product::find($request->product_id);
    
        if($request->quantity > 1 && $product->stock > 0)
        {
          if(Auth::id())
          {
            $cart = CartItem::find($request->product_id);
      
            $cart->quantity = $cart->quantity - 1;
            $cart->save();
          }
          else
          {
            $cart = session()->get('cart');
            if($cart[$request->product_id] and $cart[$request->product_id]["quantity"] >1)
            {
                $cart[$request->product_id]["quantity"] --;
                session()->put('cart', $cart);
            }
          }
          //add back stock
          $product->update(['stock' => $product->stock +=1]);
          return redirect()->intended('/cart');
        }
        elseif($request->quantity <= 1)
        {
          return redirect()->back();
        }
    
      }
    
      public function removeItem(Request $request) {
        $product = Product::find($request->product_id);

        if(Auth::id())
        {
          $user=auth()->user();
          //remove item
          $cartItem = DB::table('cart_items')
                      ->join('products', 'cart_items.product_id', '=', 'products.id')
                      ->join('users', 'cart_items.user_id', '=', 'users.id')
                      ->where('user_id', $user->id)
                      ->where('product_id', $request->product_id)
                      ->delete();
          //add back stock
          $product->update(['stock' => $product->stock +=$cartItem->quantity]);

        }
        else
        {
          $cart = session()->get('cart');
          //add back stock
          $product->update(['stock' => $product->stock += (int)$cart[$request->product_id]['quantity']]);
          //remove item
          unset($cart[$request->product_id]); 
          \Session::put('cart', $cart);
        }

        return redirect()->intended('/cart');
      }
}
