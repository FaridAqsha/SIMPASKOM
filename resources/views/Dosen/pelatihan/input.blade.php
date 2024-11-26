@extends('layout.main')

@section('isi_content')

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Form Input Pengetahuan Pelatihan
        </h2>
        
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block mt-4 text-sm" hidden>
                    <span class="text-gray-700 dark:text-gray-400" hidden>Status</span>
                    <input
                        class="block w-full mt-1 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="status" value="Belum Tervalidasi" type="hidden" />
                </label>
                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan nama kegiatan Pelatihan" id="panduan">
                                    Nama Kegiatan Pelatihan
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Nama Pengetahuan
                                </span>
                            </div>
                    <input
                        class="block w-full mt-1 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text" name="nama_pengetahuan" placeholder="Nama Pengetahuan Pelatihan" />
                        @error('nama_pengetahuan')
                            <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Nama pengetahuan harus diisi</span>
                        @enderror
                </label>
                
                 <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan nama penyelenggara" id="panduan">
                                    Penyelenggara
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Nama Penyelenggara
                                </span>
                            </div>
                    <input
                        class="block w-full mt-1 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text" name="penyelenggara" placeholder="Nama Penyelenggara" />
                        @error('penyelenggara')
                            <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Nama pengelenggara harus diisi</span>
                        @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <div class="mt-4 text-sm">
                        <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan minimal satu bidang. Klik tombol 'Bidang tidak ditemukan?' untuk menambahkan bidang baru yang tidak ada" id="panduan">
                                    Bidang Kegiatan Pelatihan   
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Bidang Kegiatan
                                </span>
                            </div>
                        <div class="mt-2">
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Operating System and Computer Network" />
                                <span class="ml-2 font-bold ">Komputer - Operating System and Computer Network</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Soft Computing" />
                                <span class="ml-2 font-bold ">Komputer - Soft Computing</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Software Engineering" />
                                <span class="ml-2 font-bold ">Komputer - Software Engineering</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Business Analyst" />
                                <span class="ml-2 font-bold ">Komputer - Business Analyst</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Data Engineering" />
                                <span class="ml-2 font-bold ">Komputer - Data Engineering</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Komputer - Multimedia" />
                                <span class="ml-2 font-bold ">Komputer - Multimedia</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Elektronika - Kontrol" />
                                <span class="ml-2 font-bold ">Elektronika - Kontrol</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Elektronika - Embedded System" />
                                <span class="ml-2 font-bold ">Elektronika - Embedded System</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Elektronika Telekomunikasi" />
                                <span class="ml-2 font-bold ">Elektronika Telekomunikasi</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Telekomunikasi" />
                                <span class="ml-2 font-bold ">Telekomunikasi</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Mekatronika" />
                                <span class="ml-2 font-bold ">Mekatronika</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Akuntansi" />
                                <span class="ml-2 font-bold ">Akuntansi</span>
                            </label>     
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Listrik" />
                                <span class="ml-2 font-bold ">Listrik</span>
                            </label>
                            </br>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="bidang[]" value="Mesin" />
                                <span class="ml-2 font-bold ">Mesin</span>
                            </label>
                            </br>                 
                        </div>
                        <button class="text-gray-700 dark:text-gray-400 mt-2" type="button" onclick="addBidangLain()" data-tippy-content="Tombol input bidang kegiatan selain yang ada pada pilihan di atas" id="panduan">Bidang tidak ditemukan?</button>
                        <input class="block w-full mt-2 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           type="text" name="bidang[]" id="bidang_lain" placeholder="Bidang Lainnya" style="display:none;" />
                        
                        @error('bidang')
                            <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Bidang harus diisi</span>
                         @enderror
                </label>

                {{-- <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Bidang Kegiatan Pelatihan Lainnya</span>
                    <input
                        class="block w-full mt-1 text-sm font-bold dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text" name="bidang_lain" placeholder="Bidang Pengetahuan Pelatihan Lainnya" />
                </label> --}}
                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan waktu kegiatan dilaksanakan. Klik ikon kalender di kanan form untuk memilih tanggal." id="panduan">
                                    Waktu
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Waktu Kegiatan atau Pengetahuan diUpload
                                </span>
                    </div>
                    <input
                        class="block w-full mt-1 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date" name="waktu"  />
                        @error('waktu')
                            <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Waktu harus diisi</span>
                        @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan deskripsi dari kegiatan yang dilaksanakan" id="panduan">
                                    Deskripsi
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Deskripsi Pengetahuan
                                </span>
                    </div>
                    <textarea
                        class="block w-full mt-1 text-sm font-bold  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"  name="deskripsi" type="text-area" placeholder="Penjelasan Singkat Pengetahuan Pelatihan"></textarea>
                    @error('deskripsi')
                        <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Deskripsi harus diisi</span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan angka nominal biaya kegiatan" id="panduan">
                                    Biaya
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Input Nominal Biaya
                                </span>
                            </div>
                    <input
                        class="block w-full mt-1 text-sm font-bold  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="number" name="biaya" placeholder="Biaya Kegiatan Pelatihan dalam Rupiah (Rp.)" />
                        @error('biaya')
                            <span class="text-gray-700 dark:text-gray-400 mt-3" style="font-size: small; color:red">Biaya harus diisi</span>
                        @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan file berukuran maksimal 2MB. Klik tombol upload untuk memilih file yang akan di upload. Klik tombol + Add More Files untuk menambah file yang diupload" id="panduan">
                                    File Materi Kegiatan Pelatihan
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Upload File Materi Dengan Ukuran Maksimal 2MB
                                </span>
                            </div>
                    <div class="relative text-gray-500 focus-within:text-purple-600">
                        <input
                            id="fileInputMat1"
                            class="hidden"
                            type="file"
                            name="materi[]"
                            placeholder="File Materi Dari Kegiatan" multiple>
                        <input
                            id="fileInputTextMat1"
                            class="block w-full pr-20 mt-1 text-sm font-bold  text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="text"
                            placeholder="File Materi Dari Kegiatan"
                            readonly multiple >
                        <button
                            id="fileInputButtonMat1"
                            class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            type="button" data-tippy-content="Tombol Upload File Materi Dari Komputer">
                            Upload File
                        </button>
                    </div>
                    @error('materi')
                        <span class="text-gray-700 dark:text-gray-400" style="font-size: small; color:red">File materi harus diisi dengan ukuran maksimal 2MB</span>
                    @enderror
                    <div id="fileInputContainer"></div>
                    <button class="text-gray-700 dark:text-gray-400 mt-1" type="button" onclick="addFileInput()" data-tippy-content="Tombol Tambah Upload File Materi" id="panduan">+ Add More Files</button>
                </label>

                <label class="block mt-4 text-sm">
                    <div class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-400" data-tippy-content="Diisi dengan file berukuran maksimal 2MB bertipe pdf. Klik tombol upload untuk memilih file yang akan di upload" id="panduan">
                                    Sertifikat Kegiatan Pelatihan
                                </span>
                                <span class="text-red-700 dark:text-red-400" style="font-size: 11px;">
                                    <sup>*</sup>Wajib Upload Sertifikat Kegiatan
                                    Dengan Ukuran Maksimal 2MB
                                </span>
                            </div>
                    <div class="relative text-gray-500 focus-within:text-purple-600">
                        <input
                            id="fileInputSert"
                            class="hidden"
                            type="file"
                            accept="application/pdf"
                            name="sertifikat"
                            placeholder="Sertifikat Dalam Bentuk pdf">
                        <input
                            id="fileInputTextSert"
                            class="block w-full pr-20 mt-1 text-sm font-bold  text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="text"
                            placeholder="Sertifikat Dalam Bentuk pdf"
                            readonly>
                        <button
                            id="fileInputButtonSert"
                            class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            type="button" data-tippy-content="Tombol Upload File Sertifikat Dari Komputer">
                            Upload File
                        </button>
                    </div>
                    @error('sertifikat')
                        <span class="text-gray-700 dark:text-gray-400" style="font-size: small; color:red">File sertifikat harus diisi dengan ukuran maksimal 2MB</span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm" style="text-align: center;">
                    <button 
                        class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Input Pengetahuan
                    </button>
                </label>
            </form>
        </div>
    </div>
</main>
</div>
</div>
<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
<!-- Modal -->
<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
@keydown.escape="closeModal"
class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
role="dialog" id="modal">
<!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
<header class="flex justify-end">
    <button
        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
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
        Konfirmasi Input Pengetahuan Pelatihan
    </p>
    <!-- Modal description -->
    <p class="text-sm text-gray-700 dark:text-gray-400">
        Apakah anda yakin ingin menginputkan data pengetahuan pelatihan ini?
    </p>
</div>
<footer
    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
    <button @click="closeModal"
        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
        Batal
    </button>
    <button
        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Benar
    </button>
</footer>
</div>
</div>

<script>
    // tombol input file materi
    document.getElementById('fileInputButtonMat1').addEventListener('click', function() {
        document.getElementById('fileInputMat1').click();
    });

    document.getElementById('fileInputMat1').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('fileInputTextMat1').value = fileName;
    });

    //tombol input file sertifikat
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
    fileInputText.className = 'block w-full pr-20 mt-1 text-sm font-bold  text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input';
    fileInputText.placeholder = 'File Materi Dari Kegiatan';
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
    tippy("#fileInputButtonMat1")
     tippy("#fileInputButtonSert")
</script>
@endsection