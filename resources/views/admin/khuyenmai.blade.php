<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables - Windmill Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets1/css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('assets1/js/init-alpine.js')}}"></script>
  </head>
  <body>
    <div id="successMessage" style="display:none; 
        background: #4CAF50; 
        color: white; 
        padding: 10px; 
        border-radius: 5px; 
        margin-top: 10px;">
      Thêm khuyến mãi thành công!
    </div>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
           MiuBook
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('indexadmin')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Tổng quan</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
                
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('donhangadmin')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Đơn hàng</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
                
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('nhaphang')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                <span class="ml-4">Báo cáo nhập hàng</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
                
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('sanphamadmin')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                </svg>
                <span class="ml-4">Danh sách sản phẩm</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
                <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href=""
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                  ></path>
                </svg>
                <span class="ml-4">Khuyến mãi</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="modals.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">Báo cáo doanh thu</span>
              </a>
            </li>
          </ul>
          <div class="px-6 my-6">
            <button
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Create account
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Windmill
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="index.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="forms.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Forms</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="cards.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                <span class="ml-4">Cards</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="charts.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                </svg>
                <span class="ml-4">Charts</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="buttons.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                  ></path>
                </svg>
                <span class="ml-4">Buttons</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="modals.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">Modals</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="tables.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="ml-4">Tables</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    ></path>
                  </svg>
                  <span class="ml-4">Pages</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/login.html">Login</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/create-account.html">
                      Create account
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/forgot-password.html">
                      Forgot password
                    </a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/404.html">404</a>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="pages/blank.html">Blank</a>
                  </li>
                </ul>
              </template>
            </li>
          </ul>
          <div class="px-6 my-6">
            <button
              class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Create account
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Notifications menu -->
              <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg>
                  <!-- Notification badge -->
                  <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Messages</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          13
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Sales</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Alerts</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
              <!-- Profile menu -->
              <li class="relative">
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template x-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span>Hồ sơ cá nhân</span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>Đăng xuất</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            Khuyến mãi
            </h2>

            <button id="openModal" 
              style="background:#9933FF; margin-bottom:30px; height:40px; border-radius:10px; 
                    box-shadow:1px 0px 2px 1px blue; border:none; padding:0 20px; cursor:pointer; font-size:16px; color: white;">
              Thêm khuyến mãi
            </button>

            <div id="modalOverlay" 
              style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
                      background:rgba(0,0,0,0.5); z-index:999;">
              <div 
                style="position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); 
                      background:#fff; padding:20px; border-radius:12px; 
                      box-shadow:0px 4px 10px rgba(0,0,0,0.3); width:500px; max-width:90%; z-index:1000;">
              
                <div style="font-size:18px; font-weight:bold; margin-bottom:15px; color:#333;">
                  Thêm khuyến mãi mới
                </div>
      
                <div style="margin-bottom:20px; font-size:14px; color:#555;">
                <label>Nội dung khuyến mãi:</label><br>
                <input type="text" 
                      style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                      class="themTenKM" required
                      ><br><br>
                <label>Phần trăm giảm:</label><br>
                <input type="number" 
                      style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder = "Nhập trong khoảng từ 1% đến 100%"
                      class="themPhanTramKM" required
                      > %<br><br>
                <label>Cho đơn: </label><br>
                <input type="number" 
                      style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"  placeholder = "Giá đơn hàng tối thiểu được nhận khuyến mãi"
                      class= "themGiaDonKM" required
                      > VND<br><br>
                <label>Thời gian bắt đầu:</label><br>
                <input type="date" 
                      style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                      class="timeBD" required
                      ><br><br>
                
                <label>Thời gian kết thúc:</label><br>
                <input type="date" 
                      style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                      class="timeKT" required
                      >
              </div>`
              <div id="tt_an" style="color:red;"></div>
      
              <div style="text-align:right;">
                <button id="closeModal" 
                        style="background:red; color:white; border:none; padding:8px 16px; 
                              border-radius:8px; cursor:pointer;">
                  Đóng
                </button>
                <button 
                        class="luuKM"
                        type="submit"
                        style="background:blue; color:white; border:none; padding:8px 16px; 
                              border-radius:8px; cursor:pointer; margin-left:10px;">
                  Lưu
                </button>
              </div>
            </div>
          </div>

            <!-- With avatar -->
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nội dung khuyến mãi</th>
                      <th class="px-4 py-3">Thời gian bắt đầu</th>
                      <th class="px-4 py-3">&emsp;&nbsp;Thời gian kết thúc</th>
                      <th class="px-4 py-3">&nbsp;&nbsp;Sửa</th>
                      <th class="px-4 py-3">&nbsp;&nbsp;Xóa</th>
                    </tr>
                  </thead>
                  @foreach($dskm as $km)
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >                 
                            <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                
                                <div>
                                    <p class="font-semibold" style="color:green;">{{$km->nd_khuyen_mai}}</p>
                                </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center text-sm">
                                
                                <div>
                                    <p class="font-semibold">{{$km->ngay_bat_dau}}</p>
                                </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                
                                <div>
                                    <p class="font-semibold">{{$km->ngay_ket_thuc}}</p>
                                </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <Button style="background:green; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                " data-id="{{$km->ma_khuyen_mai}}" class="moBtnSua">Sửa</Button>
                                <!-- Hộp thoại khi nhấn nút sửa -->
                                <div class="anHienBtnSua" data-id="{{$km->ma_khuyen_mai}}"
                                  style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
                                          background:rgba(0,0,0,0.5); z-index:999;">
                                  <div 
                                    style="position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); 
                                          background:#fff; padding:20px; border-radius:12px; 
                                          box-shadow:0px 4px 10px rgba(0,0,0,0.3); width:500px; max-width:90%; z-index:1000;">
                                  
                                    <div style="font-size:18px; font-weight:bold; margin-bottom:15px; color:#333;">
                                      Sửa khuyến mãi
                                    </div>
                                    <div style="margin-bottom:20px; font-size:14px; color:#555;">
                                    <label>Nội dung khuyến mãi:</label><br>
                                    <input type="text" 
                                          style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                                          class="suaTenKM" required
                                          value = "{{$km->nd_khuyen_mai}}"
                                          ><br><br>
                                    <label>Phần trăm giảm:</label><br>
                                    <input type="number" 
                                          style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;" placeholder = "Nhập trong khoảng từ 1% đến 100%"
                                          class="themPhanTramKM" required
                                          value = "{{$km->phan_tram_giam}}"
                                          > %<br><br>
                                    <label>Cho đơn: </label><br>
                                    <input type="number" 
                                          style="width:90%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"  placeholder = "Giá đơn hàng tối thiểu được nhận khuyến mãi"
                                          class= "suaGiaDonKM" required
                                          value = "{{$km->gia_don_hang}}"
                                          > VND<br><br>
                                    <label>Thời gian bắt đầu:</label><br>
                                    <input type="date" 
                                          style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                                          class="suatimeBD" required
                                          value = "{{$km->ngay_bat_dau}}"
                                          ><br><br>
                                    
                                    <label>Thời gian kết thúc:</label><br>
                                    <input type="date" 
                                          style="width:100%; padding:8px; margin-top:5px; border-radius:6px; border:1px solid #ccc;"
                                          class="suatimeKT" required
                                          value = "{{$km->ngay_ket_thuc}}"
                                          >
                                  </div>
                                  <div id="tt_an_sua" style="color:red;"></div>
                          
                                  <div style="text-align:right;">
                                    <button class="dongBtnSua" data-id="{{$km->ma_khuyen_mai}}"
                                            style="background:red; color:white; border:none; padding:8px 16px; 
                                                  border-radius:8px; cursor:pointer;">
                                      Đóng
                                    </button>
                                    <button data-id="{{$km->ma_khuyen_mai}}"
                                            class="luuBtnSua"
                                            type="submit"
                                            style="background:blue; color:white; border:none; padding:8px 16px; 
                                                  border-radius:8px; cursor:pointer; margin-left:10px;">
                                      Lưu
                                    </button>
                                  </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <Button style="background:blue; color: white; width: 100px ; height: 30px; border-radius: 10px; border: 1px;
                                ">Xóa</Button>
                            </td>
                            </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
              </div>
            </div>           
          </div>
        </main>
      </div>
    </div>

  <script>

    document.addEventListener("DOMContentLoaded", function (){
      const openModal = document.getElementById('openModal');
      const closeModal = document.getElementById('closeModal');
      const modalOverlay = document.getElementById('modalOverlay');

      // khai bao bien form them khuyen mai
      const themTenKM = document.querySelector('.themTenKM');
      const themPhanTramKM = document.querySelector('.themPhanTramKM');
      const themGiaDonKM = document.querySelector('.themGiaDonKM');
      const timeBD = document.querySelector('.timeBD');
      const timeKT = document.querySelector('.timeKT');
      const tt_an = document.getElementById('tt_an');
      const luuKM = document.querySelector('.luuKM');

      // khai bao bien sua khuyen mai
      const dongBtnSua = document.querySelectorAll('.dongBtnSua');
      const moBtnSua = document.querySelectorAll('.moBtnSua');


      // đóng form thêm khuyến mãi
      openModal.addEventListener('click', () => {
        modalOverlay.style.display = 'block';
      });

      closeModal.addEventListener('click', () => {
        modalOverlay.style.display = 'none';
      });

      window.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
          modalOverlay.style.display = 'none';
        }
      });

      //Đóng form sua khuyen mai      
      moBtnSua.forEach(btn => {
        btn.addEventListener("click", function () {
          const id = btn.getAttribute("data-id");
          const modal = document.querySelector(`.anHienBtnSua[data-id="${id}"]`);
          if (modal) modal.style.display = "block";
        });
      });

      dongBtnSua.forEach(btn => {
        btn.addEventListener("click", function () {
          const id = btn.getAttribute("data-id");
          const modal = document.querySelector(`.anHienBtnSua[data-id="${id}"]`);
          if (modal) modal.style.display = "none";
        });
      });
    
      // xu ly su kien khi nhan them khuyen mai moi
      luuKM.addEventListener('click' , function(){
        modalOverlay.style.display = 'none';
        // lấy value sau khi nhập
        const valTenKM = themTenKM.value.trim();
        const valPhanTramKM = themPhanTramKM.value.trim();
        const valGiaDonKM = themGiaDonKM.value.trim();
        const valTimeBD = timeBD.value.trim();
        const valTimeKT = timeKT.value.trim();
        if (valTenKM === "" || valPhanTramKM === "" || valGiaDonKM === "" || valTimeBD === "" || valTimeKT === "") {
          tt_an.innerHTML = "BẠN PHẢI NHẬP ĐẦY ĐỦ THÔNG TIN!!!";
          return; // dừng lại, không gửi fetch
        }
        fetch("/khuyenmai/themkm", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
          },
          body: JSON.stringify({
            nd_km : valTenKM,
            phan_tram : valPhanTramKM,
            gia_don : valGiaDonKM,
            tg_bd : valTimeBD,
            tg_kt : valTimeKT
          })
        })
        .then(response => response.json())
        .then(data => {
          console.log("Thêm khuyến mãi thành công:", data);
        })
        .catch(error => {
          console.error("Thêm Khuyến mãi thất bại:", error);
          
        });
        window.location.href = window.location.href;
        alert("Bạn đã thêm khuyến mãi thành công");
      });

    });

    
  </script>
  </body>
</html>
