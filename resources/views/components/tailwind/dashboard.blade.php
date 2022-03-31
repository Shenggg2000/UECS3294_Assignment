<div>
  <div class="min-h-screen bg-gray-50" x-data="{ isOpenMobile: false }">
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                alt="Workflow">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/admin/dashboard"
                  class="@if ($bannerTitle == 'Dashboard') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium"
                  aria-current="page">Dashboard</a>

                <a href="/admin/users"
                  class="@if ($bannerTitle == 'Users') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Users</a>

                  <a href="/admin/product_categories"
                  class="@if ($bannerTitle == 'Product Categories') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Product Categories</a>

                <a href="/admin/products"
                  class="@if ($bannerTitle == 'Products') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Products</a>

                <a href="/admin/orders"
                  class="@if ($bannerTitle == 'Orders') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Orders</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Profile dropdown -->
              <div x-data="{ isOpen: false }" class="ml-3 relative">
                <div>
                  <button type="button" @click="isOpen = !isOpen"
                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full"
                      src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                      alt="">
                  </button>
                </div>

                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                  role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700"
                    role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" @click="isOpenMobile = !isOpenMobile"
              class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
              aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div x-show="isOpenMobile" class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/admin/dashboard"
            class="@if ($bannerTitle == 'Dashboard') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-base font-medium"
            aria-current="page">Dashboard</a>

          <a href="/admin/users"
            class="@if ($bannerTitle == 'Users') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-base font-medium">Users</a>

          <a href="/admin/product_categories"
            class="@if ($bannerTitle == 'Product Categories') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-base font-medium">Product Categories</a>

          <a href="/admin/products"
            class="@if ($bannerTitle == 'Products') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-base font-medium">Products</a>

          <a href="/admin/orders"
            class="@if ($bannerTitle == 'Orders') bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif px-3 py-2 rounded-md text-base font-medium">Orders</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
            </div>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Log
              out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $bannerTitle }}</h1>
      </div>
    </header>
    <main>
      @yield('admincontent')
    </main>
  </div>
</div>
