@extends('layout.main')

@section('isi_content')

        <main class="h-full pb-16 overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Form Edit Pengetahuan Sertifikasi Kompetensi
                </h2>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form id="updateForm" action="{{ route('serkom.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <label class="block mt-4 text-sm">
                                                    <input name="status"
                                value="{{ $data->status }}" type="hidden"/>
                            <span
                            <span class="text-gray-700 dark:text-gray-400">Status</span>
                            <input name="status"
                                value="{{ $data->status }}" type="hidden"/>
                            <span
                                class="px-2 py-1 font-bold leading-tight 
                                {{ 
                                    $data->status == 'Belum Tervalidasi' ? 'text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' :
                                    ($data->status == 'Tervalidasi' ? 'text-green-700 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-700' : '')
                                }}">
                                {{ $data->status }}
                            </span>
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Kegiatan Sertifikasi Kompetensi</span>
                            <input name="nama_pengetahuan"
                                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->nama_pengetahuan }}" />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Penyelenggara</span>
                            <input name="penyelenggara"
                                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->penyelenggara }}" />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Dosen</span>
                            <input 
                                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->users->name }}" readonly/>
                        </label>

                        <label class="block mt-4 text-sm">
                            <div class="mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Bidang Kegiatan Sertifikasi Kompetensi
                                </span>
                                <div class="mt-2">
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Operating System and Computer Network" 
                                            @if(in_array("Komputer - Operating System and Computer Network", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Operating System and Computer Network</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Soft Computing" 
                                            @if(in_array("Komputer - Soft Computing", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Soft Computing</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Software Engineering" 
                                            @if(in_array("Komputer - Software Engineering", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Software Engineering</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Business Analyst" 
                                            @if(in_array("Komputer - Business Analyst", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Business Analyst</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Data Engineering" 
                                            @if(in_array("Komputer - Data Engineering", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Data Engineering</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Komputer - Multimedia" 
                                            @if(in_array("Komputer - Multimedia", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Komputer - Multimedia</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Elektronika - Kontrol" 
                                            @if(in_array("Elektronika - Kontrol", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Elektronika - Kontrol</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold" 
                                            name="bidang[]" value="Elektronika - Embedded System" 
                                            @if(in_array("Elektronika - Embedded System", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Elektronika - Embedded System</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Elektronika Telekomunikasi" 
                                            @if(in_array("Elektronika Telekomunikasi", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Elektronika Telekomunikasi</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Telekomunikasi" 
                                            @if(in_array("Telekomunikasi", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Telekomunikasi</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Mekatronika" 
                                            @if(in_array("Mekatronika", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Mekatronika</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Akuntansi" 
                                            @if(in_array("Akuntansi", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Akuntansi</span>
                                    </label>     
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Listrik" 
                                            @if(in_array("Listrik", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Listrik</span>
                                    </label>
                                    </br>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="checkbox"
                                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray font-bold"
                                            name="bidang[]" value="Mesin" 
                                            @if(in_array("Mesin", $bidang)) checked @endif/>
                                        <span class="ml-2 font-bold">Mesin</span>
                                    </label>   
                                    </br>
                            </div>
                            
                            <button class="text-gray-700 dark:text-gray-400 mt-2" type="button" onclick="addBidangLain()" data-tippy-content="Tombol input bidang kegiatan selain yang ada pada pilihan di atas" id="panduan">Bidang tidak ditemukan?</button>
                        <input class="block w-full mt-2 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           type="text" name="bidang[]" id="bidang_lain" placeholder="Bidang Lainnya" style="display:none;" />
                            @error('bidang')
                                <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Bidang harus diisi</span>
                            @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Waktu</span>
                            <input
                                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="date" name="waktu" value="{{ $data->waktu }}" />
                                @error('waktu')
                                    <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Waktu harus diisi</span>
                                @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                            <textarea
                                class="block w-full mt-1 text-sm font-bold dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" name="deskripsi">{{ $data->deskripsi }}</textarea>
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Biaya</span>
                            <input name="biaya"
                                class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->biaya }}" />
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                File Materi Kegiatan Sertifikasi Kompetensi
                            </span>
                            @foreach($materi as $index => $m)
                            
                            <div class="relative text-gray-500 focus-within:text-purple-600 mt-4">
                                <input
                                    id="fileInputidMat{{$index}}"
                                    class="hidden"
                                    type="hidden"
                                    value="{{ $m->id }}"
                                    name="materi_ids[]" multiple>
                                <input
                                    id="fileInputMat{{$index}}"
                                    class="hidden file-input"
                                    type="file"
                                    name="materi[]"
                                    placeholder="File Materi" multiple>
                                <input
                                    id="fileInputTextMat{{$index}}"
                                    class="block w-full pr-20 mt-1 text-sm font-bold text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input file-input-text"
                                    type="text"
                                    placeholder="File Materi"
                                    value="{{ $m->file_name }}"
                                    readonly multiple >
                                <button
                                    id="fileInputButtonMat{{$index}}"
                                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple file-input-button"
                                    type="button">
                                    Upload File
                                </button>                                      
                            </div>           
                            
                            @endforeach
                            @error('materi')
                            <span class="text-gray-700 dark:text-gray-400" style="font-size: small; color:red">File materi harus diisi</span>
                            @enderror
                            <div id="fileInputContainer"></div>
                            <div style="display: flex; align-items: center; justify-content: space-between; position: relative; margin-top: 0.5px;">
                                <button class="text-gray-700 dark:text-gray-400 mt-1 font-semibold mt-3" style="color: green" type="button" onclick="addFileInput()" data-tippy-content="Tombol Tambah Upload File Materi" id="panduan">(+) Tambah File Materi</button>
                                <div class="flex justify-end font-semibold mt-3">
                                    <button href="#myModal1"
                                            class="modal-button" style="color: red" data-tippy-content="Tombol Menu Hapus File Materi" id="panduan">
                                            (-) Hapus File Materi
                                    </button>
                                </div>
                            </div>
                            </div>
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Sertifikat Kegiatan Sertifikasi Kompetensi
                            </span>

                            @foreach($sertifikat as $index => $s)
                            <div class="relative text-gray-500 focus-within:text-purple-600">
                                <input
                                    id="fileInputidMat{{$index}}"
                                    class="hidden"
                                    type="hidden"
                                    value="{{ $s->id }}"
                                    name="sertifikat_ids[]" multiple>
                                <input
                                    id="fileInputSert"
                                    class="hidden"
                                    type="file"
                                    name="sertifikat[]"                                 
                                    placeholder="Sertifikat Dalam Bentuk pdf">
                                <input
                                    id="fileInputTextSert"
                                    class="block w-full pr-20 mt-1 text-sm font-bold text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                    type="text"   
                                    value="{{ $s->file_name }}"
                                    placeholder="Sertifikat Dalam Bentuk pdf"
                                    readonly>
                                <button
                                    id="fileInputButtonSert"
                                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                    type="button">
                                    Upload File
                                </button>
                            </div>
                            @endforeach

                            @error('sertifikat')
                                <span class="text-gray-700 dark:text-gray-400" style="font-size: small; color:red">File sertifikat harus diisi</span>
                            @enderror
                        </label>
                        <label class="block mt-6 mb-4 text-sm" style="text-align: center;">
                            <button  type="button" data-toggle="modal" data-target="#confirmationModal"
                                class=" px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Edit Pengetahuan
                            </button>
                        </label>
                        
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Konfirmaasi modal -->
<div id="confirmationModal"
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
                Konfirmasi Perubahan
            </p>
            <!-- Modal description -->
            <p class="text-sm text-gray-700 dark:text-gray-400">
                Apakah anda yakin ingin mengubah data dari pengetahuan ini?
            </p>
        </div>
        <footer
            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button 
                class="close w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Batal
            </button>
        
                <button id="confirmUpdate"
                    type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Benar
                </button>
            </form>
        
        </footer>
    </div>
</div>

<!-- Konfirmaasi modal -->
<div id="myModal1"
class="modal fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <div
        class="modal-content w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl">
    
        <header>
            <div style="display: flex; align-items: center; justify-content: space-between; position: relative; margin-top: 0.5px;">
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300 mt-4">
                Pilih materi yang ingin dihapus
            </p>
            <div class="flex justify-end">
                <button
                    class="close inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            </div>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
            <!-- Modal title -->
            
            @foreach($materi as $m)
            <form action="{{ route('serkom.materi.delete', $m->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div style="display: flex; align-items: center; justify-content: space-between; position: relative; margin-top: 0.5px;">
                <p class="mt-4 text-sm text-gray-700 dark:text-gray-400" style="font-size: medium">
                    {{ $m->file_name }}            
                </p>
                <button style="right: 0px; position: absolute;"
                    type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" data-tippy-content="Tombol Hapus File Materi" id="panduan">
                    x
                </button>
                </div>
                
                
            </form>
            @endforeach
        </div>
        <footer
            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button 
                class="close w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Batal
            </button>
           
        </footer>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#confirmUpdate').click(function() {
            $('#updateForm').submit();
        });
    });
</script>


<script>

    // input file materi
    // Mendapatkan semua elemen tombol
    const buttons = document.querySelectorAll('.file-input-button');

    // Menambahkan event listener ke setiap tombol
    buttons.forEach((button, index) => {
        button.addEventListener('click', function() {
            document.getElementById('fileInputMat' + index).click();
        });
    });

    // Mendapatkan semua elemen input file
    const fileInputs = document.querySelectorAll('.file-input');

    // Menambahkan event listener ke setiap input file
    fileInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            const fileName = this.files[0].name;
            document.getElementById('fileInputTextMat' + index).value = fileName;
        });
    });



     //input file sertifikat
     document.getElementById('fileInputButtonSert').addEventListener('click', function() {
        document.getElementById('fileInputSert').click();
    });

    document.getElementById('fileInputSert').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('fileInputTextSert').value = fileName;
    });

    
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('fileInputButtonMat').addEventListener('click', function() {
            document.getElementById('fileInputMat').click();
        });

        document.getElementById('fileInputMat').addEventListener('change', function() {
            document.getElementById('fileInputTextMat').value = this.files[0].name;
        });
    });

    function addFileInput() {
    // Buat container untuk input file baru
    const container = document.createElement('div');
    container.className = 'relative text-gray-500 focus-within:text-purple-600 mt-4';

    // Buat elemen input file
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'materi[]';
    fileInput.className = 'hidden';
    fileInput.placeholder = 'File Materi';

    // Buat elemen input text yang readonly
    const fileInputText = document.createElement('input');
    fileInputText.type = 'text';
    fileInputText.className = 'block w-full pr-20 mt-1 text-sm font-bold text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input';
    fileInputText.placeholder = 'File Materi';
    fileInputText.readOnly = true;

    // Buat tombol upload
    const fileInputButton = document.createElement('button');
    fileInputButton.type = 'button';
    fileInputButton.className = 'absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple';
    fileInputButton.textContent = 'Upload File';

    // Tambahkan event listener untuk tombol upload
    fileInputButton.addEventListener('click', function() {
        fileInput.click();
    });

    // Tambahkan event listener untuk input file
    fileInput.addEventListener('change', function() {
        fileInputText.value = this.files[0].name;
    });

    // Tambahkan elemen-elemen ke dalam container
    container.appendChild(fileInput);
    container.appendChild(fileInputText);
    container.appendChild(fileInputButton);

    // Tambahkan container ke dalam fileInputContainer
    document.getElementById('fileInputContainer').appendChild(container);
}
</script>

<script>
    function addBidangLain() {
        var bidangLainInput = document.getElementById('bidang_lain');
        bidangLainInput.style.display = 'block';
    }
</script>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script>
    tippy("#panduan")
</script>
@endsection