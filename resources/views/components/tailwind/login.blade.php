<div class="min-h-screen bg-gray-50">
  <div class="min-h-full flex items-center justify-center py-12 px-4 bg-gray-50 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
          alt="Workflow" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Login') }} to your account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
        </p>
      </div>
      <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-8">
            <div class="pb-5">
              <div class="col-span-6">
                <label htmlFor="street-address" class="block text-sm font-medium text-gray-700">
                  {{ __('Email Address') }}
                </label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                  autofocus
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
                <input type="password" name="password" required autocomplete="current-password" id="password"
                  class="@error('password') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                @error('password')
                  <span class="block text-sm font-medium text-red-500" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="pb-5">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                  <label htmlFor="remember-me" class="ml-2 block text-sm text-gray-900">
                    {{ __('Remember Me') }}
                  </label>
                </div>

                <div class="text-sm">
                  <a href="register" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Didn't have account?
                  </a>
                </div>
              </div>
            </div>

            <div>
              <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                </span>
                {{ __('Login') }}
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
