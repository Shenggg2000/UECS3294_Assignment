@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Products">
  @section('admincontent')
    <div class="p-6">
      <div class="flex justify-between pb-5">
        <p class="self-center">A list of all the product in application</p>
        <a href="/admin/products/create"
          class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
          Product</a>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                Description
              </th>
              <th scope="col" class="px-6 py-3">
                SKU
              </th>
              <th scope="col" class="px-6 py-3">
                Product Category
              </th>
              <th scope="col" class="px-6 py-3">
                Price
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ $product['name'] }}
                </th>
                <td class="px-6 py-4">
                  {{ $product['desc'] }}
                </td>
                <td class="px-6 py-4">
                  {{ $product['SKU'] }}
                </td>
                <td class="px-6 py-4">
                  {{ $product['product_category']['name'] }}
                </td>
                <td class="px-6 py-4">
                  {{ $product['price'] }}
                </td>
                <td class="px-6 py-4 text-right">
                  <a href="/admin/products/{{ $product['id'] }}/edit"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  <a href="#" onclick="event.preventDefault();
                        document.getElementById('delete-form-{{ $product['id'] }}').submit();"
                    class="ml-4 font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                  <form id="delete-form-{{ $product['id'] }}" action="/admin/products/{{ $product['id'] }}" method="POST"
                    class="d-none">
                    {{ method_field('DELETE') }}
                    @csrf
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div>
        {{ $products->links() }}
      </div>
    </div>
  @endsection
</x-tailwind.dashboard>
@endsection
