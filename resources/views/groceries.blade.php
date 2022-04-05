@extends('layouts.app')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="/css/app.css" rel="stylesheet">

@section('content')
  <x-tailwind.header/>

  <div className="container">
    <div class="bg-white">
      <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
          @foreach ($products as $product)
            <div class="group relative">
              <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <a href="{{url('/groceries/detail',$product->id)}}"><img src="C:\Users\user\Desktop\210006627050-1p.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full"/></a>
              </div>
              <div class="mt-4 flex justify-between">
                  <div>
                  <h3 class="text-sm text-gray-700">
                      {{ $product->name }}
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">${{ $product->price }}</p>
                  </div>
                  <div class="flex space-x-2 justify-center">
                    @if($product->stock > 0)
                    <form action="{{ url('addcart') }}" method="POST">
                      @csrf
                        <div class="flex ml-auto ">
                          <input
                            type="number"
                            class="
                              w-16 mb-2 form-control block px-4 py-1.5 ml-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            value="1" min="1"
                            name="quantity"
                            placeholder="Number input"
                          />
                      </div>
                      <input hidden name="product_id" value={{ $product->id }} />
                      <input hidden name="product_name" value={{ $product->name }} />
                      <input hidden name="product_price" value={{ $product->price }} />
                      <button
                      type="submit"
                      data-mdb-ripple="true"
                      data-mdb-ripple-color="light"
                      class="inline-block px-6 py-2.5 bg-red-500 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                      >Add</button>
                    </form>
                    @else
                    <p class="w-16 mb-2 float-right">OUT OF STOCK</p>
                    @endif
                  </div>
              </div>
            </div>            
          @endforeach

          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
