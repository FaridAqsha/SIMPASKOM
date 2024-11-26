@extends('layout.main')

@section('isi_content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Form Detail Pengetahuan Sertifikasi Kompetensi
    </h2>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Status</span>
        </label>
        <div class="mt-2 "> 
            <span
                class="px-2 py-1 font-bold leading-tight 
                {{ 
                    $data->status == 'Belum Tervalidasi' ? 'text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' :
                    ($data->status == 'Tervalidasi' ? 'text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700' : '')
                }}">
                {{ $data->status }}
            </span>
        </div>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nama Kegiatan Sertifikasi Kompetensi</span>
            <input
                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ $data->nama_pengetahuan }}" readonly />
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Penyelenggara</span>
            <input
                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ $data->penyelenggara }}" readonly />
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nama Dosen</span>
            <input
                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="{{ $data->users->name }}" readonly />
        </label>

        <label class="block mt-4 text-sm">
            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Bidang Kegiatan Sertifikasi Kompetensi
                </span>
                <div class="mt-2">
                    @foreach($bidang as $b)                    
                    <label class="inline-flex items-center text-sm font-bold  focus:outline-none dark:text-gray-300">
                        <span class="ml-2">{{ $b }}</span>
                    </label>
                    </br>
                    {{-- <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <span class="ml-2">Software Engineer</span>
                    </label> --}}
                    @endforeach
                </div>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
            <textarea
                class="block w-full mt-1 text-sm font-bold dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3"
                readonly>{{ $data->deskripsi }}</textarea>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Biaya</span>
            <input
                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value="Rp. {{ number_format($data->biaya, 0, ',', '.') }}" readonly />
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                File Materi Kegiatan Sertifikasi Kompetensi
            </span>
            @foreach($materi as $m)   
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input
                    class="block w-full pr-20 mt-1 text-sm font-bold text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    value="{{ $m->file_name }}" readonly />
                <a href="{{ route('serkom.materi',['id' => $m->id]) }}">
                   <button type="button" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" data-tippy-content="Tombol Unduh File Materi" id="panduan">
                    Unduh
                   </button>
                </a>
            </div>
            @endforeach
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Sertifikat Kegiatan Sertifikasi Kompetensi
            </span>
            @foreach($sertifikat as $s)   
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input
                    class="block w-full pr-20 mt-1 text-sm font-bold text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    value="{{ $s->file_name }}" readonly />
                <a href="{{ route('serkom.sertifikat',['id' => $s->id]) }}">
                    <button
                        class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" data-tippy-content="Tombol Unduh File Sertifikat" id="panduan">
                        Unduh
                    </button>
                </a>
            </div>
            @endforeach
        </label>
        @if(Auth::user()->id == $data->id_pengguna && $data->status == 'Belum Tervalidasi' || Auth::user()->level == 1)
        <label class="block mt-4 text-sm" style="text-align: center;">
            <a  href="{{ route('serkom.edit',['id' => $data->id]) }}">
                <button
                    class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Edit Pengetahuan
                </button>
            </a>
            <button href="#myModal1"
            class="modal-button px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Hapus Pengetahuan
            </button>
        </label>
        @else
        <label class="block mt-4 text-sm" style="text-align: center;">
            <a  href="{{ route('serkom.index') }}">
                <button
                    class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Kembali
                </button>
            </a>
        </label>
        @endif
    </div>
</div>

<!-- Konfirmaasi modal -->
<div id="myModal1"
class="modal fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <div
        class="modal-content w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl">

        <header class="flex justify-end">
            <button
                class="close inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
            <!-- Modal title -->
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Konfirmasi Hapus
            </p>
            <!-- Modal description -->
            <p class="text-sm text-gray-700 dark:text-gray-400">
                Apakah anda yakin ingin menghapus pengetahuan ini?
            </p>
        </div>
        <footer
            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button 
                class="close w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Batal
            </button>
            <form action="{{ route('serkom.delete', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Benar
                </button>
            </form>
        </footer>
    </div>
</div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script>
    tippy("#panduan")
</script>
@endsection