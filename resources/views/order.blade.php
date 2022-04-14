@extends('layouts.app')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
  <x-tailwind.header/>

    <div class="min-h-screen bg-gray-300">
        @if(Auth::guest())
            <div class="bg-indigo-100 rounded-lg py-5 px-6 mb-4 text-base text-indigo-700 mb-3" role="alert">
                You must login to checkout.
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid  ">
                        <h1 class="text-xl font-medium mt-6 pt-6 border-t">Your Order</h1>
                        <div class="col-span-2">
                            @if (!empty($grpOrders))
                                @foreach ($grpOrders as $index=>$orders)
                                    <h3 class="text-xl font-medium my-6 pt-6 border-t">Order  {{ (int)$index+1 }}</h3>
                                    <div>
                                        @foreach ($orders->productOrders as $order)
                                            <span class="text-right	text-sm font-medium text-gray-400 mr-1">Quantity: {{ $order->quantity }}</span>                                            
                                            @foreach ($order->products as $product)
                                            <div class="flex items-center mb-3">
                                                <img src="{{asset("no-picture.jpg")}}" width="60" class="rounded-full ">
                                                <div class="flex flex-col ml-3"> <span class="md:text-md font-medium">Product Name : {{ $product->name }}</span></div>
                                            </div>
                                            @endforeach
                                        @endforeach
                                    </div>

                                    <div class="flex justify-between items-center mt-2 pt-2 border-t">
                                        <div class="flex justify-center items-end"> <span class="text-right	text-sm font-medium text-gray-400 mr-1">Total:</span> <span class="text-lg font-bold text-gray-800 ">RM {{ $orders->amount }}</span> </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="place-content-center items-center mt-6 pt-6 border-t">
                                    <p class="text-center">You have not placed an order</p>
                                    <br>                                    
                                </div>
                            @endif                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
@endsection

