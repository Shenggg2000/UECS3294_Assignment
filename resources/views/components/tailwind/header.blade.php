<div>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div x-data="{ isOpenMobile: false }" class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="{{ url('/') }}">
            <span class="sr-only">Grocery</span>
            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button @click="isOpenMobile = !isOpenMobile" type="button"
            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
            aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
          <div x-data="{ isOpen: false }" class="relative">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
            <button type="button" @click="isOpen = !isOpen"
              class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              aria-expanded="false">
              <span>Shop</span>
              <!--
              Heroicon name: solid/chevron-down

              Item active: "text-gray-600", Item inactive: "text-gray-400"
            -->
              <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </button>
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-1"
              class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
              <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Analytics</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Engagement</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Security</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Integrations</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Automations</p>
                    </div>
                  </a>
                  <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <div class="ml-4">
                      <p class="text-base font-medium text-indigo-600">Shop All</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900"> Pricing </a>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900"> Docs </a>
        </nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          @guest
            @if (Route::has('login'))
              <a href="login" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900"> Login
              </a>
            @endif

            @if (Route::has('register'))
              <a href="register"
                class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Register </a>
            @endif
          @else
            <div x-data="{ isOpenProfile: false }" class="relative">
              <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
              <button type="button" @click="isOpenProfile = !isOpenProfile"
                class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                aria-expanded="false">
                <span>{{ Auth::user()->name }}</span>
                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>
              <div x-show="isOpenProfile" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute z-10 -ml-4 mt-3 transform px-2 sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                  <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                      <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">Cart</p>
                      </div>
                    </a>
                    <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                      <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                      </svg>
                      <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">Orders</p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
              class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
              {{ __('Logout') }} </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @endguest
        </div>
      </div>
    </div>
    <div x-show="isOpenMobile" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
      x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
      class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
          <div class="flex items-center justify-between">
            <div>
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                alt="Workflow">
            </div>
            <div class="-mr-2">
              <button @click="isOpenMobile = !isOpenMobile" type="button"
                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div class="mt-6">
            <nav class="grid gap-y-8">
              <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                <!-- Heroicon name: outline/chart-bar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
                <span class="ml-3 text-base font-medium text-gray-900"> Analytics </span>
              </a>
              <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="ml-3 text-base font-medium text-indigo-600"> Shop All </span>
              </a>
            </nav>
          </div>
        </div>
        <div class="py-6 px-5 space-y-6">
          <div>
            @guest
              @if (Route::has('login'))
                <a href="register"
                  class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                  Register </a>
              @endif

              @if (Route::has('register'))
                <p class="mt-6 text-center text-base font-medium text-gray-500">
                  Existing customer?
                  <a href="login" class="text-indigo-600 hover:text-indigo-500"> Login </a>
                </p>
              @endif
            @else
              <p class="text-base text-center font-medium text-gray-900">Hello, {{ Auth::user()->name }}</p>
              <div class="flex relative bg-white py-6">
                <a href="#"
                  class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-base font-medium hover:bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">Cart</p>
                  </div>
                </a>
                <a href="#"
                  class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-base font-medium hover:bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-4 text-indigo-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                  </svg>
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">Orders</p>
                  </div>
                </a>
              </div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                {{ __('Logout') }} </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
