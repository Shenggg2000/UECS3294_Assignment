@extends('layouts.app')

@section('content')
  <x-tailwind.header/>
@endsection

@section('frontcontent')
  <div className="container">
    <div class="bg-white mb-5">
      @if ($category != null)
        <h2 class="px-4 pt-16 text-center text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">{{ $category }}</h2>
      @else
        <h2 class="px-4 pt-16 text-center text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Shop All Groceries</h2>
      @endif
      <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
          @foreach ($products as $product)
            <div class="group relative">
              <div
                class="w-full min-h-56 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-56 lg:aspect-none">
                <a href="{{ url('/groceries/detail', $product->id) }}"><img
                    src="{{ asset('no-picture.jpg') }}"
                    class="w-full h-full object-center object-cover lg:w-full lg:h-full" /></a>
              </div>
              <div class="mt-4 flex justify-between">
                <div class="w-4/6">
                  <h3 class="w-100 text-ellipsis overflow-hidden text-sm text-gray-700">
                    {{ $product->name }}
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">${{ $product->price }}</p>
                </div>
                <div class="flex space-x-2 justify-center">
                  @if ($product->stock > 0)
                    <form action="{{ url('addcart') }}" method="POST">
                      @csrf
                      <div class="flex ml-auto ">
                        <input type="number"
                          class="
                            w-16 mb-2 form-control block px-4 py-1.5 ml-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                          value="1" min="1" name="quantity" placeholder="Number input" />
                      </div>
                      <input hidden name="product_id" value={{ $product->id }} />
                      <input hidden name="product_name" value={{ $product->name }} />
                      <input hidden name="product_price" value={{ $product->price }} />
                      <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
                    </form>
                  @else
                    <p class="w-16 mb-2 float-right">Out of Stock</p>
                  @endif
                </div>
              </div>
            </div>
          @endforeach

        </div>

        <div class="mt-10">
          {{ $products->links() }}
        </div>

      </div>
    </div>
  </div>
@endsection
