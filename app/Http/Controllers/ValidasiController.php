<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PelatihanModel;
use App\Models\SertifikasiKompetensiModel;
use App\Models\MateriPelatihanModel;
use App\Models\SertifikatPelatihanModel;
use App\Models\MateriSerkomModel;
use App\Models\SertifikatSerkomModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InputSerkomNotif;
use App\Notifications\InputPelatihanNotif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ValidasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $itemsPerPage = 5; // Jumlah item per halaman

        // Ambil data dari PelatihanModel
        $datpel = PelatihanModel::join('users', 'pelatihan.id_pengguna', '=', 'users.id')
            ->where('pelatihan.status', 'Belum Tervalidasi')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('pelatihan.id', 'like', '%' . $search . '%')
                        ->orWhere('pelatihan.nama_pengetahuan', 'like', '%' . $search . '%')
                        ->orWhere('pelatihan.bidang', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            })
            ->select('pelatihan.*', 'users.name as user_name')
            ->sortable()
            ->get();

        // Ambil data dari SertifikasiKompetensiModel
        $datser = SertifikasiKompetensiModel::join('users', 'sertifikasi_kompetensi.id_pengguna', '=', 'users.id')
            ->where('sertifikasi_kompetensi.status', 'Belum Tervalidasi')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('sertifikasi_kompetensi.id', 'like', '%' . $search . '%')
                        ->orWhere('sertifikasi_kompetensi.nama_pengetahuan', 'like', '%' . $search . '%')
                        ->orWhere('sertifikasi_kompetensi.bidang', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            })
            ->select('sertifikasi_kompetensi.*', 'users.name as user_name')
            ->sortable()
            ->get();

        // Gabungkan kedua koleksi data
        $merged = $datpel->merge($datser);

        // Lakukan paginasi manual
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $merged->slice(($currentPage - 1) * $itemsPerPage, $itemsPerPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($merged), $itemsPerPage);
        $paginatedItems->setPath($request->url());

        return view('Admin/validasi/validasi', compact('paginatedItems', 'search'));
    }


    public function validasi_aksi($id, $jenis)
    {
        if ($jenis == 'pelatihan') {
            $data = PelatihanModel::find($id);
            $jenis = $jenis;
            $bidangstring = $data->bidang;
            $bidang = explode(',', $bidangstring);

            $materi = MateriPelatihanModel::where('pelatihan_model_id', $id)->get();
            $sertifikat = SertifikatPelatihanModel::where('pelatihan_model_id', $id)->get();
            return view('Admin/validasi/pelatihan', compact('data', 'bidang', 'materi', 'sertifikat', 'jenis'));
        } else {
            $data = SertifikasiKompetensiModel::find($id);
            $jenis = $jenis;
            $bidangstring = $data->bidang;
            $bidang = explode(',', $bidangstring);

            $materi = MateriSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
            $sertifikat = SertifikatSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
            return view('Admin/validasi/serkom', compact('data', 'bidang', 'materi', 'sertifikat', 'jenis'));
        }
    }

    public function update($id, $jenis)
    {
        if ($jenis == 'pelatihan') {
            $pelatihan = PelatihanModel::find($id);
            $pelatihan->update(['status' => 'Tervalidasi']);

            /////// Notifikasi ///////

            // Mendapatkan user yang login
            $loggedInUser = Auth::user();

            // Cari user yang memiliki k_bidang yang sesuai
            $usersWithSameField = User::where(function ($query) use ($pelatihan) {
                $bidangPelString = $pelatihan->bidang;
                $bidangPelArray = explode(',', $bidangPelString);

                foreach ($bidangPelArray as $bidang) {
                    $query->orWhere('k_bidang', 'LIKE', '%' . $bidang . '%');
                }
            })->where('id', '!=', $loggedInUser->id)
                ->Where('id', '!=', $pelatihan->id_pengguna)
                ->get();

            // Mendapatkan user level 1 kecuali user yang sudah ada di daftar notifikasi
            $levelOneUsers = User::where('level', 1)
                ->whereNotIn('id', $usersWithSameField->pluck('id'))
                ->get();

            // Mendapatkan user yang memiliki pengetahuan kecuali user yang sudah ada di daftar notifikasi
            $pelatihanUsers = User::where('id', $pelatihan->id_pengguna)
                ->whereNotIn('id', $usersWithSameField->pluck('id'))
                ->get();

            // Membuat pesan notifikasi untuk user dengan bidang yang sama
            $commonFieldMessage = 'Pengetahuan Pelatihan dengan nama ' . $pelatihan->nama_pengetahuan . ' telah tervalidasi';

            // Mengirim notifikasi ke user dengan bidang yang sama
            foreach ($usersWithSameField as $user) {
                $waktu = Carbon::now()->format('d-m-Y H:i:s');
                $user->notify(new InputPelatihanNotif($pelatihan, $commonFieldMessage, $waktu));
                $user->has_new_notifications = true;
                $user->save();
            }

            // Membuat pesan notifikasi untuk user level 1
            $levelOneMessage = 'Pengetahuan Pelatihan dengan nama ' . $pelatihan->nama_pengetahuan . ' telah tervalidasi';

            // Mengirim notifikasi ke user level 1
            foreach ($levelOneUsers as $user) {
                $waktu = Carbon::now()->format('d-m-Y H:i:s');
                $user->notify(new InputPelatihanNotif($pelatihan, $levelOneMessage, $waktu));
                $user->has_new_notifications = true;
                $user->save();
            }

            // Mengirim notifikasi ke user yang memiliki pengetahuan pelatihan
            $pelatihanUsersMessage = 'Pengetahuan Pelatihan Anda dengan nama ' . $pelatihan->nama_pengetahuan . ' telah divalidasi ' .
                ' oleh ' .  $loggedInUser->name;
            //$loggedInUser->notify(new InputSerkomNotif($pelatihan, $loggedInUserMessage));
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            Notification::send($pelatihanUsers, new InputPelatihanNotif($pelatihan, $pelatihanUsersMessage, $waktu));
            $loggedInUser->has_new_notifications = true;
            $loggedInUser->save();

        } else {
            $serkom = SertifikasiKompetensiModel::find($id);
            $serkom->update(['status' => 'Tervalidasi']);

            /////// Notifikasi ///////

            // Mendapatkan user yang login
            $loggedInUser = Auth::user();

            // Cari user yang memiliki k_bidang yang sesuai
            $usersWithSameField = User::where(function ($query) use ($serkom) {
                $bidangPelString = $serkom->bidang;
                $bidangPelArray = explode(',', $bidangPelString);

                foreach ($bidangPelArray as $bidang) {
                    $query->orWhere('k_bidang', 'LIKE', '%' . $bidang . '%');
                }
            })->where('id', '!=', $loggedInUser->id)
                ->Where('id', '!=', $serkom->id_pengguna)
                ->get();

            // Mendapatkan user level 1 kecuali user yang sudah ada di daftar notifikasi
            $levelOneUsers = User::where('level', 1)
                ->whereNotIn('id', $usersWithSameField->pluck('id'))
                ->get();

            // Mendapatkan user yang memiliki pengetahuan kecuali user yang sudah ada di daftar notifikasi
            $serkomUsers = User::where('id', $serkom->id_pengguna)
                ->whereNotIn('id', $usersWithSameField->pluck('id'))
                ->get();

            // Membuat pesan notifikasi untuk user dengan bidang yang sama
            $commonFieldMessage = 'Pengetahuan Sertifikasi Kompetensi dengan nama ' . $serkom->nama_pengetahuan . ' telah tervalidasi';

            // Mengirim notifikasi ke user dengan bidang yang sama
            foreach ($usersWithSameField as $user) {
                $waktu = Carbon::now()->format('d-m-Y H:i:s');
                $user->notify(new InputSerkomNotif($serkom, $commonFieldMessage, $waktu));
                $user->has_new_notifications = true;
                $user->save();
            }

            // Membuat pesan notifikasi untuk user level 1
            $levelOneMessage = 'Pengetahuan Sertifikasi Kompetensi dengan nama ' . $serkom->nama_pengetahuan . ' telah tervalidasi';

            // Mengirim notifikasi ke user level 1
            foreach ($levelOneUsers as $user) {
                $waktu = Carbon::now()->format('d-m-Y H:i:s');
                $user->notify(new InputSerkomNotif($serkom, $levelOneMessage, $waktu));
                $user->has_new_notifications = true;
                $user->save();
            }

            // Mengirim notifikasi ke user yang memiliki pengetahuan serkom
            $serkomUsersMessage = 'Pengetahuan Sertifikasi Kompetensi Anda dengan nama ' . $serkom->nama_pengetahuan . ' telah divalidasi ' .
                ' oleh ' .  $loggedInUser->name;
            //$loggedInUser->notify(new InputSerkomNotif($pelatihan, $loggedInUserMessage));
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            Notification::send($serkomUsers, new InputSerkomNotif($serkom, $serkomUsersMessage, $waktu));
            $loggedInUser->has_new_notifications = true;
            $loggedInUser->save();

        }
        return redirect()->route('validasi.index');
    }
}
