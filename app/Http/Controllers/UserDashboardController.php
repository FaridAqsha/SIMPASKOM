<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PelatihanModel;
use App\Models\SertifikasiKompetensiModel;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index()
    {
        $data = User::get();
        $user = Auth::user();

        $user_bidang = $user->k_bidang;
        $user_id = $user->id;

        $c_pelatihan = PelatihanModel::where('id_pengguna', $user_id)->get()->count();
        $c_serkom = SertifikasiKompetensiModel::where('id_pengguna', $user_id)->get()->count();
        $c_pengetahuan = $c_pelatihan + $c_serkom;

        $unvalid_serkom = SertifikasiKompetensiModel::where('id_pengguna', $user_id)
            ->where('status', 'Belum Tervalidasi')
            ->get();

        $unvalid_pelatihan = PelatihanModel::where('id_pengguna', $user_id)
            ->where('status', 'Belum Tervalidasi')
            ->get();


        // Mengambil k_bidang dari pengguna dan memecahnya menjadi array
        $bidangstring = $user->k_bidang;
        $bidangArray = explode(',', $bidangstring);



        // Memulai query untuk pelatihan
        $query_pelatihan = PelatihanModel::query();
        // Menambahkan kondisi untuk setiap bidang di array
        foreach ($bidangArray as $bidang) {
            $query_pelatihan->orWhereRaw('FIND_IN_SET(?, bidang)', [$bidang]);
        }
        // Mendapatkan hasil query pelatihan
        $pelatihan_diminati = $query_pelatihan->orderBy('created_at', 'desc')->take(3)->get();


        // Memulai query untuk serkom
        $query_serkom = SertifikasiKompetensiModel::query();
        // Menambahkan kondisi untuk setiap bidang di array
        foreach ($bidangArray as $bidang) {
            $query_serkom->orWhereRaw('FIND_IN_SET(?, bidang)', [$bidang]);
        }
        // Mendapatkan hasil query serkom
        $serkom_diminati = $query_serkom->orderBy('created_at', 'desc')->take(3)->get();

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($pelatihan_diminati as $item) {
            $item->bidang = str_replace(',', '</br>', $item->bidang);
        }

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($serkom_diminati as $item) {
            $item->bidang = str_replace(',', '</br>', $item->bidang);
        }

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($unvalid_serkom as $item) {
            $item->bidang = str_replace(',', '</br>', $item->bidang);
        }

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($unvalid_pelatihan as $item) {
            $item->bidang = str_replace(',', '</br>', $item->bidang);
        }


        return view('Admin/dashboard/user_dashboard', compact(
            'data',
            'c_pelatihan',
            'c_serkom',
            'c_pengetahuan',
            'unvalid_serkom',
            'unvalid_pelatihan',
            'pelatihan_diminati',
            'serkom_diminati'
        ));
    }
}
