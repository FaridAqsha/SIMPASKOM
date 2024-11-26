@extends('layout.main')

@section('isi_content')

<div class="container px-6 mx-auto grid">
    <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Profile Akun
    </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form id="updateForm" action="{{ route('profile.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input name="level" value="{{ $data->level }}"  type="hidden" readonly/>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input 
                            name="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $data->name }}"  />
                    </label>
                    <div class="form-group">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input
                                name="email"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->email }}"  />
                        </label>
                    </div>
                    <div class="form-group">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Jabatan</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                          <input type="radio"
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            name="jabatan" value="Staf" 
                                            @checked($data->jabatan == 'Staf') />
                                          <span class="ml-2">Staf</span>
                                        </label>
                                        <br/>
                                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                          <input type="radio"
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            name="jabatan" value="Dosen" 
                                            @checked($data->jabatan == 'Dosen') />
                                          <span class="ml-2">Dosen</span>
                                        </label>

                                    </div>
                    {{-- <div class="form-group">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Bidang</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $data->k_bidang }}" />
                        </label>
                    </div> --}}
                    <label class="block mt-4 text-sm">
                        <div class="mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Bidang yang Diminati 
                            </span>
                            <div class="mt-2">
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Operating System and Computer Network" 
                                        @if(in_array("Komputer - Operating System and Computer Network", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Operating System and Computer Network</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Soft Computing" 
                                        @if(in_array("Komputer - Soft Computing", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Soft Computing</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Software Engineering" 
                                        @if(in_array("Komputer - Software Engineering", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Software Engineering</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Business Analyst" 
                                        @if(in_array("Komputer - Business Analyst", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Business Analyst</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Data Engineering" 
                                        @if(in_array("Komputer - Data Engineering", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Data Engineering</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Komputer - Multimedia" 
                                        @if(in_array("Komputer - Multimedia", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Komputer - Multimedia</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Elektronika - Kontrol" 
                                        @if(in_array("Elektronika - Kontrol", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Elektronika - Kontrol</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Elektronika - Embedded System" 
                                        @if(in_array("Elektronika - Embedded System", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Elektronika - Embedded System</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Elektronika Telekomunikasi" 
                                        @if(in_array("Elektronika Telekomunikasi", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Elektronika Telekomunikasi</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Telekomunikasi" 
                                        @if(in_array("Telekomunikasi", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Telekomunikasi</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Mekatronika" 
                                        @if(in_array("Mekatronika", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Mekatronika</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Akuntansi" 
                                        @if(in_array("Akuntansi", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Akuntansi</span>
                                </label>     
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Listrik" 
                                        @if(in_array("Listrik", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Listrik</span>
                                </label>
                                </br>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="k_bidang[]" value="Mesin" 
                                        @if(in_array("Mesin", $k_bidang)) checked @endif/>
                                    <span class="ml-2">Mesin</span>
                                </label>                
                        </div>
                    </label>        
                    </div>
                    <label class="block mt-6 mb-4 text-sm" style="text-align: center;">
                        <button  type="button" data-toggle="modal" data-target="#confirmationModal"
                            class=" px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Edit Akun
                        </button>
                    </label>
                </form>
                </div>
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
                Apakah anda yakin ingin mengubah data dari akun ini?
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#confirmUpdate').click(function() {
            $('#updateForm').submit();
        });
    });
</script>
@endsection