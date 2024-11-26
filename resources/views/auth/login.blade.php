<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - SIMPASKOM</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('mu/public/assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('mu/public/assets/js/init-alpine.js') }}"></script>
</head>

<body>
  <div class="flex flex-col min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Container for centering header and card -->
    <div class="flex flex-1 flex-col items-center justify-center">
      <!-- Header Text -->
      <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200" style="font-size: 30px;">
        SIMPASKOM
      </h2>
      <h2 class="text-lg font-semi-bold text-gray-800 dark:text-gray-200 mb-8" style="font-size: 15px">
        POLITEKNIK CALTEX RIAU
      </h2>
      <!-- Card -->
      <div class="h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('mu/public/assets/img/pcr_log.jpeg')}}"
              alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('mu/public/assets/img/pcr_log.jpeg') }}"
              alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Login Akun
              </h1>

              <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />

              <form method="POST" action="{{ route('login') }}">
                @csrf

                <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="auth/redirect" >
                  <center>
                    <table>
                      <td>
                        <img alt="Logo" width="35" height="35" src="{{ asset('mu/public/assets/img/google.png')}}" class="h-10px me-3">
                      </td>
                      <td>
                        <p style="font-size: large;">Sign in with Google</p>
                      </td>
                    </table>
                  </center>
                </a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


