<div>
  <div class="min-h-full flex items-center justify-center py-12 px-4 bg-gray-50 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
          alt="Workflow" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          {{ __('Register') }} an account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
        </p>
      </div>
      <form action="{{ route('register') }}" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-8">
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
              <div class="flex items-center justify-center">
                <div class="text-sm">
                  <a href="login" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Already have account?
                  </a>
                </div>
              </div>
            </div>

            <div>
              <button type='submit'
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </span>
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
