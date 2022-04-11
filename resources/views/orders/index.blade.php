@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Orders">
  @section('admincontent')
    <div class="p-6" x-data="{ isOpenAddModal: @if ($errors->any()) true @else false @endif }">
      <div class="flex justify-between pb-5">
        <p class="self-center">A list of all the orders in application including their name, email and role</p>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3 w-12">
                #
              </th>
              <th scope="col" class="px-6 py-3">
                Order by
              </th>
              <th scope="col" class="px-6 py-3">
                Order created on
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">View</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $key => $order)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ ++$key }}
                </td>
                <td class="px-6 py-4">
                  {{ $order->user->name }}
                </td>
                <td class="px-6 py-4">
                  {{ $order['created_at'] }}
                </td>
                <td class="px-6 py-4 text-right">
                  <a href="/admin/orders/{{ $order['id'] }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div>
        {{ $orders->links() }}
      </div>
    </div>
  @endsection
</x-tailwind.dashboard>
@endsection
