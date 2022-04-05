@extends('layouts.app')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="/css/app.css" rel="stylesheet">

@section('content')
  <x-tailwind.header/>

  <div className="container">
    <div class="pl-10 mt-5 text-center bg-white text-sm title-font text-gray-500 place-content-center">
      <nav class="bg-grey-light rounded-md w-full">
        <ol class="list-reset flex">
          <li><a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-700">Grocery</a></li>
          <li><span class="text-gray-500 mx-2">></span></li>
          <li><a href="/groceries/{{ strtolower($product->product_category->name) }}" class="text-blue-600 hover:text-blue-700">{{ $product->product_category->name }}</a></li>
        </ol>
      </nav>
    </div>
    <div class="p-8 m-10 mt-2 text-center bg-white text-3xl h-5/6 place-content-center border-2 border-slate-300 rounded">
          <div class="p-5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="w-1/3 h-1/4" src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg">
            <div class="w-2/3 h-1/4 pl-5">
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
              <p class="py-5 text-sm title-font text-gray-500 tracking-widest">{{ $product->desc }}</p>
              <div class="py-10 ">
                <div class="flex ">
                  <span class="ml-auto title-font font-medium text-2xl text-gray-900 mr-50px">RM {{ $product->price }}</span>
                </div>
                <div class="pt-5">
                  @if($product->stock > 0)
                  <form action="{{ url('addcart') }}" method="POST">
                    @csrf
                      <div class="flex ml-auto ">
                        <input
                          type="number"
                          class="
                            w-36 mb-2 form-control block px-4 py-1.5 ml-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                          value="1" min="1"
                          name="quantity"
                          placeholder="Number input"
                        />
                    </div>
                    <input hidden name="product_id" value={{ $product->id }} />
                    <input hidden name="product_name" value={{ $product->name }} />
                    <input hidden name="product_price" value={{ $product->price }} />
                    <button class="mr-50 flex ml-auto text-white bg-red-500 border-0 px-3 py-1.5 focus:outline-none hover:bg-red-600 rounded"
                    type="submit">Add</button>
                  </form>
                  @else
                  <p class=" w-36 mb-2 float-right">OUT OF STOCK</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
    </div>

  </div>

@endsection
