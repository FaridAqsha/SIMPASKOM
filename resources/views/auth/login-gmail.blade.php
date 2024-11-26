<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Windmill Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('mu/public/assets/css/tailwind.output.css') }}" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('mu/public/assets/js/init-alpine.js') }}"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('mu/public/assets/img/pcr_log.jpeg')}}
              alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('mu/public/assets/img/pcr_log.jpeg')}}
              alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Sign in Account
              </h1>
  
  
              <!-- You should use a button here, as the anchor is only used for the example  -->
  
  
              <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=https%3A%2F%2Fmahasiswa.pcr.ac.id%2Fauth%2Foauth&amp;client_id=939231276908-p2qmussr38pgpmvhnsgech0khmcsr57h.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+profile&amp;access_type=offline&amp;approval_prompt=auto">
                <center>
                  <table>
  
                    <td>
                      <img alt="Logo" src="{{ asset('mu/public/assets/img/google.png')}} class="h-20px me-3">
                    </td>
                    <td>
                      <p style="font-size: large;">Sign in with Google</p>
                    </td>
  
                  </table>
                </center>
              </a>
  
  
  
  
              <!--
              <p class="mt-1">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="./create-account.html">
                  Belum memilki akun?
                </a>
              </p>
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>


