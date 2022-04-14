@extends('layouts.app')

@section('content')
  <x-tailwind.header />

  <div class="min-h-screen bg-gray-300" x-data="{ isOpenEditModal: @if ($errors->any()) true @else false @endif }">
    <div class="py-12">
      <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">User Profile</h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Username</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $user->name }}</dd>
              </div>
              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $user->email }}</dd>
              </div>
            </dl>
          </div>
          <div class="flex justify-end m-10">
            <a type="button" @click="isOpenEditModal = true"
              class="mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit
              Profile</a>
          </div>
        </div>
      </div>
    </div>
    <div x-show="isOpenEditModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
      aria-modal="true">
      <div x-show="isOpenEditModal"
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div @click="isOpenEditModal = false" x-show="isOpenEditModal" x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"
          aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div x-show="isOpenEditModal" x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <form action="/edit" method="POST">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <h3 class="text-lg leading-6 font-medium text-gray-900 pb-4" id="modal-title">Edit Profile</h3>
              @csrf
              <div class="pb-5">
                <div class="col-span-6">
                  <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                    {{ __('Name') }}
                  </label>
                  <input type="text" name="name" id="name" value="{{ $user['name'] }}" required autocomplete="name"
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
                  <input type="text" name="email" id="email" value="{{ $user['email'] }}" required autocomplete="email"
                    class="@error('email') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                  @error('email')
                    <span class="block text-sm font-medium text-red-500" role="alert">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="submit"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Edit Profile</button>
              <button @click="isOpenEditModal = false" type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
