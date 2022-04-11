@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Products">
  @section('admincontent')
    <div class="px-8 py-9">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Editing Product - <span
                  class="font-semibold">{{ $product['name'] }}</span></h3>
              <p class="mt-1 text-sm text-gray-600">Please insert all information required for new product. This
                information will be displayed publicly so be careful what you
                share.</p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="/admin/products/{{ $product['id'] }}" method="POST">
              {{ method_field('PUT') }}
              @csrf
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input type="text" name="name" id="name" value="{{ $product['name'] }}"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                          placeholder="Name">
                      </div>
                      @error('name')
                        <span class="block text-sm font-medium text-red-500" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-6">
                    <div>
                      <label for="company-website" class="block text-sm font-medium text-gray-700"> Product Category
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <select id="product_category_id" name="product_category_id"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                          @foreach ($product_categories as $product_category)
                            @if ($product['product_category_id'] == $product_category['id'])
                              <option value="{{ $product_category['id'] }}" selected> {{ $product_category['name'] }}
                              </option>
                            @else
                              <option value="{{ $product_category['id'] }}"> {{ $product_category['name'] }} </option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                      @error('product_category_id')
                        <span class="block text-sm font-medium text-red-500" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div>
                      <label for="name" class="block text-sm font-medium text-gray-700">SKU</label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input type="text" name="SKU" id="sku" value="{{ $product['SKU'] }}"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                          placeholder="SKU">
                      </div>
                      @error('SKU')
                        <span class="block text-sm font-medium text-red-500" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-6">
                    <div>
                      <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input type="number" name="stock" id="sku" value="{{ $product['stock'] }}"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                          placeholder="Stock">
                      </div>
                      @error('stock')
                        <span class="block text-sm font-medium text-red-500" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div>
                      <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                          class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                          RM </span>
                        <input type="text" name="price" id="price" value="{{ $product['price'] }}"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                          placeholder="0.00">
                      </div>
                      @error('price')
                        <span class="block text-sm font-medium text-red-500" role="alert">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div>
                    <label for="desc" class="block text-sm font-medium text-gray-700"> Description </label>
                    <div class="mt-1">
                      <textarea id="about" name="desc" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="Description">{{ $product['desc'] }}</textarea>
                    </div>
                    @error('desc')
                      <span class="block text-sm font-medium text-red-500" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6">
                  <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endsection
</x-tailwind.dashboard>
@endsection
