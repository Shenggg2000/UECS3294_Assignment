@extends('layouts.app')

@section('content')
  <x-tailwind.dashboard bannerTitleParam="Users">
  @section('admincontent')
    <div class="p-6" x-data="{ isOpenAddModal: @if ($errors->any()) true @else false @endif }">
      <div class="flex justify-between pb-5">
        <p class="self-center">A list of all the users in application including their name, email and role</p>
        <button type="button" @click="isOpenAddModal = true"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
          User</button>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                Email
              </th>
              <th scope="col" class="px-6 py-3">
                Role
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ $user['name'] }}
                </th>
                <td class="px-6 py-4">
                  {{ $user['email'] }}
                </td>
                <td class="px-6 py-4">
                  {{ $user['role'] }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div>
        {{ $users->links() }}
      </div>
      <form action="/admin/users" method="POST">
        <x-tailwind.modals objectNameParam="Add User">
        @section('modalcontent')
          @csrf
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
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
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                {{ __('Email Address') }}
              </label>
              <input type="text" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                class="@error('email') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              @error('email')
                <span class="block text-sm font-medium text-red-500" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                {{ __('Password') }}
              </label>
              <input type="password" name="password" id="password" required autocomplete="new-password"
                class="@error('password') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              @error('password')
                <span class="block text-sm font-medium text-red-500" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
          </div>
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                {{ __('Confirm Password') }}
              </label>
              <input type="password" name="password_confirmation" id="password_confirmation" required
                autocomplete="new-password"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
            </div>
          </div>
          <div class="pb-5">
            <div class="col-span-6">
              <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                {{ __('Role') }}
              </label>
              <select id="role" name="role" class="mt-1 border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
            </div>
          </div>
        @endsection
      </x-tailwind.modals>
    </form>
  </div>
@endsection
</x-tailwind.dashboard>
@endsection
