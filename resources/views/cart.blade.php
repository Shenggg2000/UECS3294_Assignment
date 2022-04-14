@extends('layouts.app')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
  <x-tailwind.header />

  <div class="min-h-screen bg-gray-300">
    @if (Auth::guest())
      <div class="bg-indigo-100 rounded-lg py-5 px-6 mb-4 text-base text-indigo-700 mb-3" role="alert">
        You must login to checkout.
      </div>
    @endif
    <div class="py-12">
      <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="w-full p-4 px-5 py-5">
          <div class="md:grid  ">
            <div class="col-span-2 p-5">
              <h1 class="text-xl font-medium ">Shopping Cart</h1>
              <?php $totalAmount = 0; ?>
              @if (!empty($carts))
                @foreach ($carts as $cart)
                  <div class="flex justify-between items-center mt-6 pt-6">
                    <div class="flex items-center"> 
                      <img src="{{ asset('no-picture.jpg') }}" width="60" class="rounded-full">
                      <div class="flex flex-col ml-3"> <span class="md:text-md font-medium">{{ $cart['name'] }}</span>
                      </div>
                    </div>
                    <div class="flex justify-center items-center place-content-center">
                      <div class="pr-8 flex ">
                        <form action="{{ url('minQuantity', $cart['product_id']) }}" method="POST">
                          @csrf
                          <input hidden name="quantity" value={{ $cart['quantity'] }} />
                          <button class="font-semibold decrement-btn">-</button>
                        </form>
                        <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2"
                          value={{ $cart['quantity'] }} name="quantity">
                        <form action="{{ url('addQuantity', $cart['product_id']) }}" method="POST">
                          @csrf
                          <input hidden name="quantity" value={{ $cart['quantity'] }} />
                          <button class="font-semibold increment-btn">+</button>
                        </form>
                      </div>
                      <div class="flex ">
                        <div class="pr-8 "> <span class="text-xs font-medium place-content-center">RM
                            {{ $cart['price'] * $cart['quantity'] }}</span>

                        </div>
                        <div class="">
                          <form action="{{ url('removeItem', $cart['product_id']) }}" method="POST">
                            @csrf
                            <button class="font-semibold text-red-600">X</button>
                          </form>
                        </div>
                        <?php $totalAmount += $cart['price'] * $cart['quantity']; ?>
                      </div>

                    </div>
                  </div>
                @endforeach

                <div class="flex justify-between items-center mt-6 pt-6 border-t">
                  <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2"></i> <span
                      class="text-md font-medium text-blue-500"><a href="/groceries/all">Continue Shopping</a></span>
                  </div>
                  <div class="flex justify-center items-end"> <span
                      class="text-sm font-medium text-gray-400 mr-1">Total:</span> <span
                      class="text-lg font-bold text-gray-800 ">RM {{ $totalAmount }}</span> </div>
                </div>
                <div class="flex justify-center items-end ">
                  @if (!Auth::guest())
                    <form action="{{ url('/checkout') }}" method="POST">
                      @csrf
                      <input hidden name="totalAmount" value={{ $totalAmount }} />
                      <button
                        class="nline-block px-6 py-2.5 bg-red-500 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">CheckOut</button>
                    </form>
                  @else
                    <button type="button" onclick="window.location='{{ url('login') }}'" data-mdb-ripple="true"
                      data-mdb-ripple-color="light"
                      class="inline-block px-6 py-2.5 bg-red-500 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">CheckOut</button>
                  @endif
                </div>
              @else
                <div class="place-content-center items-center mt-6 pt-6 border-t">
                  <p class="text-center">Your cart is empty</p>
                  <br>
                  <p class="text-center font-medium text-blue-500"><a href="/groceries/all">Go Shopping</a></p>

                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
