@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Product Categories">
  @section('admincontent')
    <div class="p-6">
      <div class="flex justify-start pb-5">
        <p class="self-center">Editing Product Category - <span
            class="font-semibold">{{ $product_category['name'] }}</span></p>
      </div>
      <form action="/admin/product_categories/{{ $product_category['id'] }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="pb-5">
          <div class="col-span-6">
            <label htmlFor="name" class="block text-sm font-medium text-gray-700">
              {{ __('Name') }}
            </label>
            <input type="text" name="name" id="name" value="{{ $product_category['name'] }}" required autocomplete="name"
              class="@error('name') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
            @error('name')
              <span class="block text-sm font-medium text-red-500" role="alert">
                {{ $message }}
              </span>
            @enderror
          </div>
        </div>
        <div class="flex justify-end pb-5">
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
        </div>
      </form>
    </div>
  @endsection
</x-tailwind.dashboard>
@endsection
