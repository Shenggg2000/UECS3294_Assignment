<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userOrderController extends Controller
{
    public function checkout(Request $request) {
        $totalAmount = $request->totalAmount;
        return view('paymentForm',compact('totalAmount'));
    }
      
    public function proceedPayment(Request $request) {
        $paymentType = $request->paymentType;         
        $totalAmount = $request->totalAmount;
        $user=auth()->user();
        //create order
        $order = Order::create([
            'user_id' => $user->id, 
            'amount' => floatval($request->totalAmount), 
            'payment_method' => $request->paymentType, 
        ]);

        $cartItems = CartItem::where('user_id', $user->id)
                        ->get();
        //create product_orders
        foreach ($cartItems as $cartItem) {
            $data[] = [
                'product_id'  => $cartItem->product_id, 
                'order_id' => $order->id,
                'quantity'      => $cartItem->quantity, 
            ];

        }
        ProductOrder::insert($data);

        return redirect("clearCart");
    }

    function clearCart() 
    {
        //after payment clear the cart 
        $userid = Auth::user()->id;
        CartItem::where('user_id',$userid)->delete();
        return redirect("home");
    }

    function orders() 
    {
        $userid = Auth::user()->id;
        $grpOrders = Order::with('productOrders.products')
                    ->where('user_id', $userid)
                    ->groupBy('orders.id')
                    ->orderBy('created_at', 'ASC')
                    ->get();
        return view('order',compact('grpOrders'));
    }
}
