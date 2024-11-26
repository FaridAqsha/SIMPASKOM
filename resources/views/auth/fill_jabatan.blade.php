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
          <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('mu/public/assets/img/pcr_log.jpeg')}}"
            alt="Office" />
          <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('mu/public/assets/img/pcr_log.jpeg') }}"
            alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
              Isi Jabatan Anda
            </h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form id="updateForm" action="{{ route('jabatan.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                      <input type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="jabatan" value="Staf" />
                      <span class="ml-2">Staf</span>
                    </label>
                  </br>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                      <input type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="jabatan" value="Dosen" />
                      <span class="ml-2">Dosen</span>
                    </label>
                  </br>
                  @error('jabatan')
                    <span class="text-gray-700 dark:text-gray-400" style="font-size: small; color:red">Harap isi jabatan</span>
                   @enderror
                </div>
                <label class="block mt-6 mb-4 text-sm" style="text-align: center;">
                    <button  type="submit" 
                        class=" px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Lanjut
                    </button>
                </label>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


