@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Product Categories">
  @section('admincontent')
    <div class="p-6" x-data="{ isOpenAddModal: @if ($errors->any()) true @else false @endif }">
      <div class="flex justify-between pb-5">
        <p class="self-center">A list of all the product categories in application</p>
        <button type="button" @click="isOpenAddModal = true"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
          Product Category</button>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product_categories as $product_category)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ $product_category['name'] }}
                </th>
                <td class="px-6 py-4 text-right">
                  <a href="/admin/product_categories/{{ $product_category['id'] }}/edit"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  <a href="#" onclick="event.preventDefault();
                    document.getElementById('delete-form-{{ $product_category['id'] }}').submit();"
                    class="ml-4 font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                  <form id="delete-form-{{ $product_category['id'] }}" action="/admin/product_categories/{{ $product_category['id'] }}" method="POST" class="d-none">
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
        {{ $product_categories->links() }}
      </div>
      <form action="/admin/product_categories" method="POST">
        <x-tailwind.modals objectNameParam="Add Product Category">
        @section('modalcontent')
          @csrf
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="name" class="block text-sm font-medium text-gray-700">
                {{ __('Name') }}
              </label>
              <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name"
                class="@error('name') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              @error('name')
                <span class="block text-sm font-medium text-red-500" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
        @endsection
      </x-tailwind.modals>
    </form>
  </div>
@endsection
</x-tailwind.dashboard>
@endsection
