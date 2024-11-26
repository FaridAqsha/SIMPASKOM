@extends('layout.main')

@section('isi_content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Pilih Jenis Pengetahuan
    </h2>
    <!-- Cards with title -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
        <h4 class="mb-4 text-2xl font-semibold" style="text-align: center;">
          Pelatihan
        </h4>
        <div class="inline-flex items-center font-semibold" style="text-align: center;">
          <p>
            Kegiatan Pelatihan adalah proses atau serangkaian aktivitas yang dirancang untuk meningkatkan
            pengetahuan, keterampilan, atau kompetensi seseorang atau kelompok. Tujuan dari kegiatan pelatihan ini
            dapat bervariasi, mulai dari pengembangan keterampilan pekerjaan, peningkatan produktivitas, dan
            penguasaan terhadap konsep baru.
          </p>

        </div>
        <label class="block mt-4 text-sm" style="text-align: center;">
          <a href="{{ route('pelatihan.create') }}">
            <button
              class="px-10 py-4 font-medium leading-5 text-purple-600 transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-white hover:bg-white focus:outline-none focus:shadow-outline-purple">
              Input
            </button>
          </a>
        </label>
      </div>
      <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
        <h4 class="mb-4 text-2xl font-semibold" style="text-align: center;">
          Sertifikasi Kompetensi
        </h4>
        <div class="inline-flex items-center font-semibold" style="text-align: center;">
          <p>
            Kegiatan Sertifikasi Kompetensi adalah proses pemberian sertifikat atau pengakuan resmi terhadap
            tingkat keterampilan, pengetahuan, dan kompetensi seseorang dalam suatu bidang tertentu. Sertifikasi
            kompetensi biasanya diberikan oleh lembaga atau otoritas yang memiliki kredibilitas dalam bidang
            tersebut.
          </p>

        </div>
        <label class="block mt-4 text-sm" style="text-align: center;">
          <a href="{{ route('serkom.create') }}">
            <button
              class="px-10 py-4 font-medium leading-5 text-purple-600 transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-white hover:bg-white focus:outline-none focus:shadow-outline-purple">
              Input
            </button>
          </a>
        </label>
      </div>
    </div>


    <!-- Charts -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
    </div>
  </div>

@endsection