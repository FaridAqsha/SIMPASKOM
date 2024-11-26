<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;
use App\Models\SertifikasiKompetensiModel;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = User::get();
        $c_akun = User::get()->count();
        $c_pelatihan = PelatihanModel::get()->count();
        $c_serkom = SertifikasiKompetensiModel::get()->count();
        $c_unvalid_serkom = SertifikasiKompetensiModel::where('status', 'Belum Tervalidasi')->get()->count();
        $c_unvalid_pelatihan = PelatihanModel::where('status', 'Belum Tervalidasi')->get()->count();
        $c_unvalid = $c_unvalid_serkom + $c_unvalid_pelatihan;

        $unvalid_serkom = SertifikasiKompetensiModel::where('status', 'Belum Tervalidasi')->latest()->take(2);
        $unvalid_pelatihan = PelatihanModel::where('status', 'Belum Tervalidasi')->latest()->take(2);

        $unvalid_pengetahuan = $unvalid_serkom->union($unvalid_pelatihan)->get();

        $pelatihan = PelatihanModel::latest()->take(3)->get();
        $serkom = SertifikasiKompetensiModel::latest()->take(3)->get();

        return view('Admin/dashboard/admin_dashboard', compact(
            'data',
            'c_akun',
            'c_pelatihan',
            'c_serkom',
            'c_unvalid',
            'unvalid_pengetahuan',
            'serkom',
            'pelatihan'
        ));
    }

    public function profile()
    {
        $data = User::get();

        return view('Admin/profile/profile', compact('data'));
    }
}
