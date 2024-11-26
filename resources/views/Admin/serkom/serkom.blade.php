@extends('layout.main')

@section('isi_content')

<!-- Remove everything INSIDE this div to a really blank page -->
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Data Pengetahuan Sertifikasi Kompetensi
    </h2>
    <div class="flex justify-left flex-1 lg:mr-32" style="margin:10px">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
        <div class="absolute inset-y-0 flex items-center pl-2">
          <svg class="w-4 h-4" aria-hidden="true" fill="rgb(126,58,242)" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"></path>
          </svg>
        </div>
        <form method="GET">
          <input
            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
            type="text" name="search" value="{{$search}}" placeholder="Masukkan Kata Kunci" aria-label="Search" autofocus data-tippy-content="Inputan Cari Data Dengan Kata Kunci" id="panduan"/>
        </form>
      </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Dosen</th>
              <th class="px-4 py-3">
                <div class="flex items-center">
                    @php
                        $sortUrl = URL::current().'?'.http_build_query(array_merge(request()->except('sort', 'direction'), ['sort' => 'nama_pengetahuan', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']));
                    @endphp
                    <a href="{{ $sortUrl }}" class="flex items-center">
                        Bidang
                        <span class="material-symbols-outlined ml-2" data-tippy-content="Sorting Bidang" id="panduan">
                            swap_vert
                        </span>
                    </a>
                </div>
            </th>

            <th class="px-4 py-3">
                <div class="flex items-center">
                    @php
                        $sortUrl = URL::current().'?'.http_build_query(array_merge(request()->except('sort', 'direction'), ['sort' => 'jenis', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']));
                    @endphp
                    <a href="{{ $sortUrl }}" class="flex items-center">
                        Nama Pengetahuan
                        <span class="material-symbols-outlined ml-2" data-tippy-content="Sorting Nama Pengetahuan" id="panduan">
                            swap_vert
                        </span>
                    </a>
                </div>
            </th>

            <th class="px-4 py-3">
                <div class="flex items-center">
                    @php
                        $sortUrl = URL::current().'?'.http_build_query(array_merge(request()->except('sort', 'direction'), ['sort' => 'waktu', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']));
                    @endphp
                    <a href="{{ $sortUrl }}" class="flex items-center">
                        Waktu
                        <span class="material-symbols-outlined ml-2" data-tippy-content="Sorting Waktu" id="panduan">
                            swap_vert
                        </span>
                    </a>
                </div>
            </th>

            <th class="px-4 py-3">
                <div class="flex items-center">
                    @php
                        $sortUrl = URL::current().'?'.http_build_query(array_merge(request()->except('sort', 'direction'), ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']));
                    @endphp
                    <a href="{{ $sortUrl }}" class="flex items-center">
                        Status
                        <span class="material-symbols-outlined ml-2" data-tippy-content="Sorting Status" id="panduan">
                            swap_vert
                        </span>
                    </a>
                </div>
            </th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($data as $s)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-xs">
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
              <td class="px-4 py-3 text-xs">
                {!! $s->bidang !!}
              </td>
              <td class="px-4 py-3 text-xs">
                {{ $s->nama_pengetahuan }}
              </td>
              <td class="px-4 py-3 text-xs">
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
                <a class="inline-flex items-center w-full text-xs font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ route('serkom.detail',['id' => $s->id]) }}">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                    Detail
                  </span>
                </a>
              </td>                   
            </tr>
            @endforeach

            @if ($data->isEmpty())
              <tr class="text-gray-700 dark:text-gray-400">
                <td></td>
                <td></td>
                <td class="px-4 py-3 text-m">
                  Belum Ada Pengetahuan Sertifikasi Kompetensi
                </td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endif

          </tbody>
      </table>
      {!! $data->appends(Request::except('page'))->render() !!}
      </div>
    </div>

  </div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script>
    tippy("#panduan")
</script>
@endsection