@extends('layout.main')

@section('isi_content')

    <div class="container px-6 mx-auto grid ">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Dashboard
      </h2>
      <!-- CTA 
      <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="https://github.com/estevanmaito/windmill-dashboard">
        <div class="flex items-center">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
            </path>
          </svg>
          <span>Star this project on GitHub</span>
        </div>
        <span>View more &RightArrow;</span>
      </a>
      -->
      <!-- Cards -->
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
              </path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Akun <br>Dosen & Staff
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ $c_akun }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-backpack4" viewBox="0 0 16 16">
              <path
                d="M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
              <path
                d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1c0 .52.198.993.523 1.349A.5.5 0 0 0 2 6.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6.5a.5.5 0 0 0-.023-.151c.325-.356.523-.83.523-1.349V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2m0 1a1 1 0 0 0-1 1h2a1 1 0 0 0-1-1M3 14V6.937q.24.062.5.063h4v.5a.5.5 0 0 0 1 0V7h4q.26 0 .5-.063V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1m9.5-11a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z" />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Pengetahuan <br /> Pelatihan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ $c_pelatihan }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-journal-text" viewBox="0 0 16 16">
              <path
                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
              <path
                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
              <path
                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Pengetahuan <br /> Sertifikasi Kompetensi
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ $c_serkom }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg xmlns=" http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-clipboard2-x" viewBox="0 0 16 16">
              <path
                d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
              <path
                d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
              <path
                d="M8 8.293 6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708z" />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Pengetahuan <br /> Belum Tervalidasi
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ $c_unvalid }}
            </p>
          </div>
        </div>
      </div>

      <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
        Pengetahuan Belum Tervalidasi
      </h2>

      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Dosen</th>
                <th class="px-4 py-3">Nama Pengetahuan</th>
                <th class="px-4 py-3">Waktu</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach( $unvalid_pengetahuan as $p )
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="{{ $p->users->avatar }}" alt=""
                        loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold">{{ $p->users->name }}</p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{ $p->users->jabatan }}
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $p->nama_pengetahuan }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $p->waktu }}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                    {{ $p->status }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  @if ($p->jenis == 'pelatihan')
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ route('validasi.aksi',['id' => $p->id, 'jenis' => 'pelatihan']) }}"
                  >
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                    Validasi
                  </span>
                </a>
                @else
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ route('validasi.aksi',['id' => $p->id, 'jenis' => 'serkom']) }}"
                  >
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                    Validasi
                  </span>
                </a>
                @endif
                </td>
              </tr>
              @endforeach

              @if ($unvalid_pengetahuan->isEmpty())
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td></td>
                    <td></td>
                    <td class="px-4 py-3 text-m">
                      Belum Ada Pengetahuan yang Belum Tervalidasi
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
              @endif

            </tbody>
          </table>
        </div>
        <div
          class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <span class="flex items-center col-span-3">

          </span>
          <span class="col-span-2"></span>
          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" style="margin-right: 20px" >
            <a href="{{ route('validasi.index') }}">
              <button
              class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" data-tippy-content="Tombol Lihat Semua Data Pengetahuan Yang Belum Tervalidasi" id="panduan"
              >
              Lihat Semua Data
            </button>
            </a>
          </span>
        </div>
      </div>

      <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
        Pengetahuan Pelatihan Terbaru
      </h2>

      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Dosen</th>
                <th class="px-4 py-3">Nama Pengetahuan</th>
                <th class="px-4 py-3">Waktu</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

              @foreach( $pelatihan as $p )
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="{{ $p->users->avatar }}" alt=""
                        loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold">{{ $p->users->name }}</p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{ $p->users->jabatan }}
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $p->nama_pengetahuan }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $p->waktu }}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class=" px-2 py-1 font-semibold leading-tight 
                    {{ 
                      $p->status == 'Belum Tervalidasi' ? 'text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' :
                      ($p->status == 'Tervalidasi' ? 'text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700' : '')
                    }}">
                    {{ $p->status }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('pelatihan.detail',['id' => $p->id]) }}">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                      Detail
                    </span>
                  </a>
                </td>
              </tr>
              @endforeach

              @if ($pelatihan->isEmpty())
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td></td>
                    <td></td>
                    <td class="px-4 py-3 text-m">
                      Belum Ada Pengetahuan Pelatihan
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
              @endif

            </tbody>
          </table>
        </div>
        <div
          class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <span class="flex items-center col-span-3">

          </span>
          <span class="col-span-2"></span>
          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" style="margin-right: 20px" >
            <a href="{{ route('pelatihan.index') }}">
              <button
              class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" data-tippy-content="Tombol Lihat Semua Data Pengetahuan Pelatihan" id="panduan"
              >
              Lihat Semua Data
            </button>
            </a>
          </span>
        </div>
      </div>


      <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
        Pengetahuan Sertifikasi Kompetensi Terbaru
      </h2>

      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Dosen</th>
                <th class="px-4 py-3">Nama Pengetahuan</th>
                <th class="px-4 py-3">Waktu</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach( $serkom as $s )
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="{{ $s->users->avatar }}" alt=""
                        loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold">{{ $s->users->name }}</p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{ $s->users->jabatan }}
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $s->nama_pengetahuan }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $s->waktu }}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class=" px-2 py-1 font-semibold leading-tight 
                    {{ 
                      $s->status == 'Belum Tervalidasi' ? 'text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' :
                      ($s->status == 'Tervalidasi' ? 'text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700' : '')
                    }}">
                    {{ $s->status }}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('serkom.detail',['id' => $s->id]) }}">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                      Detail
                    </span>
                  </a>
                </td>
              </tr>
              @endforeach

              @if ($serkom->isEmpty())
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td></td>
                    <td></td>
                    <td class="px-4 py-3 text-m">
                      Belum Ada Pengetahuan Sertifikasi Kompetensi
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
              @endif


            </tbody>
          </table>
        </div>
        <div
          class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <span class="flex items-center col-span-3">

          </span>
          <span class="col-span-2"></span>
          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" style="margin-right: 20px" >
            <a href="{{ route('serkom.index') }}">
              <button
              class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" data-tippy-content="Tombol Lihat Semua Data Pengetahuan Sertifikasi Kompetensi" id="panduan"
              >
              Lihat Semua Data
            </button>
            </a>
          </span>
        </div>
      </div>


      <!-- Charts -->
      <div class="grid gap-6 mb-8 md:grid-cols-2">
      </div>
    </div>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script>
    tippy("#panduan")
</script>
@endsection