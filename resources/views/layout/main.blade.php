<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIMPASKOM</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('mu/public/assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('mu/public/assets/js/init-alpine.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script src="{{ asset('mu/public/assets/js/charts-lines.js') }}" defer></script>
  <script src="{{ asset('mu/public/assets/js/charts-pie.js') }}" defer></script>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

  <style>
    /* Hide default calendar icon */
    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 0;
    }

    /* Add custom calendar icon */
    input[type="date"] {
        position: relative;
    }

    input[type="date"]::before {
    content: "";
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
    background: url('{{ asset('mu/public/calendar.png') }}') no-repeat center center;
    background-size: contain; /* Ensure the icon is contained within the element */
    pointer-events: none;
    }
    
    /* The Modal (background) */
    .modal {

        display: none;
        /* Hidden by default */

        position: fixed;
        /* Stay in place */

        z-index: 1000;
        /* Sit on top */

        padding-top: 200px;
        /* Location of the box */

        left: 0;
        top: 0;
        width: 100%;
        /* Full width */

        height: 100%;
        /* Full height */

        overflow: auto;
        /* Enable scroll if needed */

        background-color: rgb(0, 0, 0);
        /* Fallback color */

        background-color: rgba(0, 0, 0, 0.5);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 5;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: 600px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */

    .modal-header {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    .user-profile img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
  }

  .user-profile-index img {
      width: 55px;
      height: 55px;
      border-radius: 50%;
      box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
  }

  .user-profile-detail img {
      margin-left: 40px;
      width: 300px;
      height: 300px;
      border-radius: 10%;
      box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
  }

  .profile_image_layout img {
      margin-left: 40px;
      width: 300px;
      height: 300px;
      border-radius: 10%;
      box-shadow: 0 16px 38px -12px rgba(0, 0, 0, .56), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
  }

  .flexing {
      margin-top: 30px;
      display: flex;
      gap: 80px;
      width: 100%;
  }

  .flexings {

      display: flex;
      gap: 80px;
      width: 100%;
  }


  .user_detail {
      width: 1000px;
      margin-right: 40px;
  }

  .user-details .media .avatar img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
  }

  .user-details .media .media-body .user-title {
      font-size: 14px;
      color: #000;
      font-weight: 600;
      margin-bottom: 2px;
  }

  .user-details .media .media-body .user-subtitle {
      font-size: 13px;
      color: #232323;
      margin-bottom: 0;
  }

  .no-scrollbar {
            overflow: hidden; /* Menyembunyikan scrollbar tapi tetap memungkinkan scroll */
            overflow-y: scroll; /* Hanya menyembunyikan scrollbar horizontal */
  }
  /* Untuk browser berbasis Webkit seperti Chrome, Safari, dll. */
  .no-scrollbar::-webkit-scrollbar {
      display: none; /* Ini akan menyembunyikan scrollbar */
  }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0" style="z-index: 1">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
          SIMPASKOM
        </a>
        @isset($user)
          @if ($user->level == 1)
              <ul class="mt-6">
                  <li class="relative px-6 py-3">
                      <span class="{{ request()->is('admin_dashboard') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                      <a class="inline-flex items-center w-full text-sm font-semibold {{ request()->is('admin_dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->is('admin_dashboard') ? 'dark:text-gray-100' : '' }}" href="{{ url('admin_dashboard') }}">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                          </svg>
                          <span class="ml-4">Dashboard</span>
                      </a>
                  </li>
              </ul>
          @endif

          @if ($user->level == 2)
              <ul class="mt-6">
                  <li class="relative px-6 py-3">
                      <span class="{{ request()->is('user_dashboard') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                      <a class="inline-flex items-center w-full text-sm font-semibold {{ request()->is('user_dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->is('user_dashboard') ? 'dark:text-gray-100' : '' }}" href="{{ url('user_dashboard') }}">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                          </svg>
                          <span class="ml-4">Dashboard</span>
                      </a>
                  </li>
              </ul>
          @endif
        @endisset
        <ul>
          <li class="relative px-6 py-3">                    
            <span class="{{request()->is('Admin/pelatihan/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/pelatihan/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/pelatihan/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('Admin/pelatihan/pelatihan') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4"
                viewBox="0 0 16 16">
                <path
                  d="M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
                <path
                  d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1c0 .52.198.993.523 1.349A.5.5 0 0 0 2 6.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6.5a.5.5 0 0 0-.023-.151c.325-.356.523-.83.523-1.349V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2m0 1a1 1 0 0 0-1 1h2a1 1 0 0 0-1-1M3 14V6.937q.24.062.5.063h4v.5a.5.5 0 0 0 1 0V7h4q.26 0 .5-.063V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1m9.5-11a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" />
              </svg>
              <span class="ml-4">Pelatihan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/serkom/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/serkom/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/serkom/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/serkom/serkom') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-journal-text" viewBox="0 0 16 16">
                <path
                  d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                <path
                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                <path
                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
              </svg>
              <span class="ml-4">Sertifikasi Kompetensi</span>
            </a>
          </li>
          @isset($user)
          @if ($user->level == 1)
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/validasi/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
           <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/validasi/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/validasi/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/validasi/validasi') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                <path
                  d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                <path
                  d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                <path
                  d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
              </svg>
              <span class="ml-4">Validasi Pengetahuan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/akun/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/akun/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/akun/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/akun/akun') }}">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
              </svg>
              <span class="ml-4">Akun</span>
            </a>
          </li>
          @endif
          @endisset

          <li class="relative px-6 py-3">
            <span class="{{request()->is('inputpengetahuan') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('inputpengetahuan') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('inputpengetahuan') ? 'dark:text-gray-100':''}}"
              href="{{ url('/inputpengetahuan') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                <path
                  d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z" />
                <path
                  d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
              </svg>
              <span class="ml-4">Input Pengetahuan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                </path>
              </svg>
              <span class="ml-4"><button type="submit"> Log out </button></span>
            </a>
          </form>
          </li>

        </ul>
      </div>
    </aside>
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
        SIMPASKOM
      </a>
      @isset($user)
          @if ($user->level == 1)
              <ul class="mt-6">
                  <li class="relative px-6 py-3">
                      <span class="{{ request()->is('admin_dashboard') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                      <a class="inline-flex items-center w-full text-sm font-semibold {{ request()->is('admin_dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->is('admin_dashboard') ? 'dark:text-gray-100' : '' }}" href="{{ url('admin_dashboard') }}">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                          </svg>
                          <span class="ml-4">Dashboard</span>
                      </a>
                  </li>
              </ul>
          @endif

          @if ($user->level == 2)
              <ul class="mt-6">
                  <li class="relative px-6 py-3">
                      <span class="{{ request()->is('user_dashboard') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                      <a class="inline-flex items-center w-full text-sm font-semibold {{ request()->is('user_dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->is('user_dashboard') ? 'dark:text-gray-100' : '' }}" href="{{ url('user_dashboard') }}">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                          </svg>
                          <span class="ml-4">Dashboard</span>
                      </a>
                  </li>
              </ul>
          @endif
        @endisset
        <ul>
          <li class="relative px-6 py-3">                    
            <span class="{{request()->is('Admin/pelatihan/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/pelatihan/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/pelatihan/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('Admin/pelatihan/pelatihan') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack4"
                viewBox="0 0 16 16">
                <path
                  d="M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
                <path
                  d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1c0 .52.198.993.523 1.349A.5.5 0 0 0 2 6.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6.5a.5.5 0 0 0-.023-.151c.325-.356.523-.83.523-1.349V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2m0 1a1 1 0 0 0-1 1h2a1 1 0 0 0-1-1M3 14V6.937q.24.062.5.063h4v.5a.5.5 0 0 0 1 0V7h4q.26 0 .5-.063V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1m9.5-11a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" />
              </svg>
              <span class="ml-4">Pelatihan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/serkom/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/serkom/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/serkom/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/serkom/serkom') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-journal-text" viewBox="0 0 16 16">
                <path
                  d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                <path
                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                <path
                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
              </svg>
              <span class="ml-4">Sertifikasi Kompetensi</span>
            </a>
          </li>
          @isset($user)
          @if ($user->level == 1)
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/validasi/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
           <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/validasi/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/validasi/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/validasi/validasi') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                <path
                  d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                <path
                  d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                <path
                  d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
              </svg>
              <span class="ml-4">Validasi Pengetahuan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <span class="{{request()->is('Admin/akun/*') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('Admin/akun/*') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('Admin/akun/*') ? 'dark:text-gray-100':''}}"
              href="{{ url('/Admin/akun/akun') }}">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
              </svg>
              <span class="ml-4">Akun</span>
            </a>
          </li>
          @endif
          @endisset

          <li class="relative px-6 py-3">
            <span class="{{request()->is('inputpengetahuan') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"' : ''}}"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold  {{request()->is('inputpengetahuan') ? 'text-gray-800':''}} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{request()->is('inputpengetahuan') ? 'dark:text-gray-100':''}}"
              href="{{ url('/inputpengetahuan') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                <path
                  d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z" />
                <path
                  d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
              </svg>
              <span class="ml-4">Input Pengetahuan</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
              <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                </path>
              </svg>
              <span class="ml-4"><button type="submit"> Log out </button></span>
            </a>
          </form>
          </li>

        </ul>
  </aside>
    <!-- Mobile sidebar -->
    <div class="flex flex-col flex-1 w-full">
      <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div
          class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
          <!-- Mobile hamburger -->
          <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
            </svg>
          </button>

          

          <!-- Search input -->
          <div class="flex justify-center flex-1 lg:mr-32">
            <!--
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Search for projects" aria-label="Search" />
            </div>
            -->
          </div>

          <ul class="flex items-center flex-shrink-0 space-x-6">
            <div x-data="{ isModalOpen: false, hasNewNotifications: {{ Auth::user()->has_new_notifications ? 'true' : 'false' }} }">
              <!-- Notification Button -->
              <li class="relative">
                <button @click="isModalOpen = true; hasNewNotifications = false; markNotificationsAsRead()"
                        class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                        aria-label="Notifications" aria-haspopup="true" data-tippy-content="Notifikasi">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    <span x-show="hasNewNotifications" id="notificationBadge" aria-hidden="true"
                          class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                </button>
              </li>
      
              <!-- Modal -->
              <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                  x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                  x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center text-gray-700 dark:text-gray-400">
                  <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                      x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                      x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                      x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="isModalOpen = false"
                      @keydown.escape="isModalOpen = false"
                      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                      role="dialog" id="modal">
                      <header class="flex justify-end">
                          <button
                              class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
                              aria-label="close" @click="isModalOpen = false">
                              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                  <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd" fill-rule="evenodd"></path>
                              </svg>
                          </button>
                      </header>
                      <div class="mt-4 mb-6">
                          <p class="mb-2 text-lg font-bold text-gray-700 dark:text-gray-300" style="font-size: 25px">
                              Notifikasi Pemberitahuan
                          </p>
                          <br>
                          <hr style="border:none; height:1px; color:grey; background-color: rgba(128, 128, 128, 0.353);">
          <div class="no-scrollbar" style="height: 280px; overflow-y: scroll;">
            @foreach (Auth::user()->notifications as $notification)
            <hr style="border:none; height:1px; color:grey; background-color: rgba(128, 128, 128, 0.353);">
            <p class="text-l text-black-400 dark:text-gray-100 mt-4"
              style="justify-content: center; text-align: left; font-weight: bold;">
              {{-- {{dd($notification)}} --}}
              {{ $notification->data['message'] }}
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-400" style="justify-content: center; text-align: left; ">
              {{ $notification->data['time'] }}
            </p>
            </br>
            <hr style="border:none; height:1px; color:grey; background-color: rgba(128, 128, 128, 0.353);">
            @endforeach
            <hr style="border:none; height:1px; color:grey; background-color: rgba(128, 128, 128, 0.353);">
                          </div>
                      </div>
                      <footer
                          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                      </footer>
                  </div>
              </div>
          </div>
            <!-- Theme toggler -->
            <li class="flex">
              <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme"
                aria-label="Toggle color mode" data-tippy-content="Tema Web" id="panduan">
                <template x-if="!dark">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                  </svg>
                </template>
                <template x-if="dark">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      clip-rule="evenodd"></path>
                  </svg>
                </template>
              </button>
            </li>
            <!-- Profile menu -->
            <li class="relative">
              <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true" data-tippy-content="Profile Akun" id="panduan">
                <div style="display: flex; align-items: center; justify-content: space-between; position: relative; margin-top: 0.5px;">
                <h4 style="margin-inline: 10px">{{ Auth::user()->name }}</h4>
                <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->avatar }}" alt=""
                  aria-hidden="true" />
                  <div>
              </button>
              <template x-if="isProfileMenuOpen">
                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                  class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                  aria-label="submenu">
                  <li class="flex">
                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                    href="{{ route('profile.detail',['id' => Auth::user()->id]) }}">
                      <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="flex">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                          d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                        </svg>
                        <span><button type="submit"> Log out </button></span>
                      </a>
                    </form>
                    
                  </li>
                </ul>
              </template>
            </li>
          </ul>
        </div>
      </header>
      <main  class="no-scrollbar">  
        @yield('isi_content')
      </main>
    </div>
  </div>
  
</body>

<script>
    function markNotificationsAsRead() {
        fetch('/mark-notifications-as-read', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        });
    }
</script>

<script>
  // Get the button that opens the modal
  var btn = document.querySelectorAll("button.modal-button");

  // All page modals
  var modals = document.querySelectorAll('.modal');

  // Get the <span> element that closes the modal
  var spans = document.getElementsByClassName("close");

  // When the user clicks the button, open the modal
  for (var i = 0; i < btn.length; i++) {
      btn[i].onclick = function (e) {
          e.preventDefault();
          modal = document.querySelector(e.target.getAttribute("href"));
          modal.style.display = "block";
      }
  }

  // When the user clicks on <span> (x), close the modal
  for (var i = 0; i < spans.length; i++) {
      spans[i].onclick = function () {
          for (var index in modals) {
              if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
          }
      }
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
      if (event.target.classList.contains('modal')) {
          for (var index in modals) {
              if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
          }
      }
  }
</script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script>
    tippy("#panduan")
</script>

</html>