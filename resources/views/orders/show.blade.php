@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Orders">
  @section('admincontent')
    <div class="p-6">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Order # {{ $order['id'] }} Information</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">User details and products ordered.</p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Username</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $order->user->name }}</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $order->user->email }}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Delivery Address</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">-</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Payment Status</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($order['payment_method'] == 'card')
                  Paid with Credit/Debit Card
                @elseif ($order['payment_method'] == 'cash')
                  Cash on delivery
                @endif
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Order Created on</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $order['created_at'] }}</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Product bought</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                  @foreach ($order->products as $product)
                    <div class="group relative">
                      <div
                        class="w-full min-h-80 bg-gray-50 aspect-w-1 aspect-h-1 rounded-md overflow-hidden lg:h-56 lg:aspect-none">
                        <img src="{{ asset('no-picture.jpg') }}"
                          class="w-full h-full object-center object-contain lg:w-full lg:h-full">
                      </div>
                      <div class="mt-4 flex justify-between">
                        <div>
                          <h3 class="text-sm text-gray-700">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{$product->name}}
                          </h3>
                          <p class="mt-1 text-sm text-gray-500">Price: ${{$product->price}}</p>
                          <p class="mt-1 text-sm text-gray-500">Quantity: {{$product->pivot->quantity}}</p>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Total Amount</dt>
              <?php $sum = 0 ?>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">$
                @foreach ($order->products as $product)
                  <?php $sum += ($product->price * $product->pivot->quantity) ?>
                @endforeach
                {{$sum}}
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  @endsection
</x-tailwind.dashboard>
@endsection
