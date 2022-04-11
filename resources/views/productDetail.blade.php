@extends('layouts.app')

@section('content')
  <x-tailwind.header />
@endsection

@section('frontcontent')
  <div class="bg-white">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="{{ url('/groceries') }}" class="mr-2 text-sm font-medium text-gray-900">Groceries</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true" class="w-4 h-5 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>

          <li class="text-sm">
            <a href="/groceries/{{ strtolower($product->product_category->name) }}" aria-current="page"
              class="font-medium text-gray-500 hover:text-gray-600">{{ $product->product_category->name }} </a>
          </li>
        </ol>
      </nav>

      <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
        <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
          <img src="{{ asset('no-picture-long.jpg') }}" alt="Two each of gray, white, and black shirts laying flat."
            class="w-full h-full object-center object-contain">
        </div>
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img src="{{ asset('no-picture.jpg') }}" alt="Model wearing plain black basic tee."
              class="w-full h-full object-center object-contain">
          </div>
          <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img src="{{ asset('no-picture.jpg') }}" alt="Model wearing plain gray basic tee."
              class="w-full h-full object-center object-contain">
          </div>
        </div>
        <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
          <img src="{{ asset('no-picture-long.jpg') }}" alt="Model wearing plain white basic tee."
            class="w-full h-full object-center object-contain">
        </div>
      </div>

      <!-- Product info -->
      <div
        class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
        </div>

        <!-- Options -->
        <div class="mt-4 lg:mt-0 lg:row-span-3">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl text-gray-900">${{ $product->price }}</p>


          @if ($product->stock > 0)
            <form action="{{ url('addcart') }}" method="POST">
              @csrf
              <div class="flex ml-auto mt-6 items-center justify-between">
                <h3 class="text-sm text-gray-900 font-medium">Quantity</h3>
                <input type="number"
                  class="
                          w-1/2 form-control block px-4 py-2 ml-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  value="1" min="1" name="quantity" placeholder="Number input" />
              </div>
              <input hidden name="product_id" value={{ $product->id }} />
              <input hidden name="product_name" value={{ $product->name }} />
              <input hidden name="product_price" value={{ $product->price }} />
              <button type="submit"
                class="mt-6 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                to bag</button>
            </form>
          @else
            <button type="button"
              class="cursor-not-allowed mt-10 w-full bg-indigo-400 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white ">Out
              of Stock</button>
          @endif

        </div>

        <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <!-- Description and details -->
          <div>
            <div class="space-y-6">
              <p class="text-base text-gray-900">{{ $product->desc }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
