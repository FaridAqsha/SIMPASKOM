@extends('layout.main')

@section('isi_content')

<div class="container px-6 mx-auto grid">
                    <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Detail Akun
                    </h2>
                    <div class="flexing px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                        <div class="profile_image" style="margin-top:50px">
                            <span class="user-profile-detail"><img src="{{ $data->avatar }}"></span>
                        </div>
                        <div class="user_detail">
                            <form align="left">
                                <div class="form-group">
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                                        <input
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            value="{{ $data->name }}" readonly />
                                    </label>
                                    <div class="form-group">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                                            <input
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                value="{{ $data->email }}" readonly />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Jabatan</span>
                                            <input
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                value="{{ $data->jabatan }}" readonly />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Bidang</span>
                                            @foreach($k_bidang as $b)
                                            <input
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                value="{{ $b }}" readonly />
                                            @endforeach
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Level Pengguna</span>
                                            <input
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                value="{{ $data->level }}" readonly />
                                        </label>
                                    </div>

                            </form>
                        </div>
                        <label class="block mt-4 text-sm" style="text-align: center;">
                            <a  href="{{ route('akun.edit',['id' => $data->id]) }}">
                                <button
                                    class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Edit akun
                                </button>
                            </a>
                        </label>
                    </div>
                </div>

        </div>
@endsection