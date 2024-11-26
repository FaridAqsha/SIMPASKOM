<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SertifikasiKompetensiModel;
use App\Models\MateriSerkomModel;
use App\Models\SertifikatSerkomModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\InputSerkomNotif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class SerkomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $data = SertifikasiKompetensiModel::join('users', 'sertifikasi_kompetensi.id_pengguna', '=', 'users.id')
                ->where(function ($query) use ($search) {
                    $query->where('sertifikasi_kompetensi.id', 'like', '%' . $search . '%')
                        ->orWhere('sertifikasi_kompetensi.nama_pengetahuan', 'like', '%' . $search . '%')
                        ->orWhere('sertifikasi_kompetensi.bidang', 'like', '%' . $search . '%')
                        ->orWhere('sertifikasi_kompetensi.status', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                })
                ->select('sertifikasi_kompetensi.*', 'users.name as user_name')
                ->paginate(5);
        } else {
            $data = SertifikasiKompetensiModel::sortable()->latest()->paginate(5);
        }

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($data as $item) {
            $item->bidang = str_replace(',', '<br>', $item->bidang);
        }

        return view('Admin/serkom/serkom', compact('data', 'search'));
    }

    public function detail_serkom(Request $request, $id)
    {
        $data = SertifikasiKompetensiModel::find($id);
        $bidangstring = $data->bidang;
        $bidang = explode(',', $bidangstring);

        $materi = MateriSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
        $sertifikat = SertifikatSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();

        //dd($data);
        return view('Admin/serkom/detail', compact('data', 'bidang', 'materi', 'sertifikat'));
    }

    public function create_serkom()
    {
        return view('Dosen/serkom/input');
    }

    public function store_serkom(Request $request)
    {
        //dd($request->all());

        // validation untuk form input
        $validator = Validator::make($request->all(), [
            'nama_pengetahuan' => 'required',
            'bidang' => 'required|array',
            'penyelenggara' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
            'materi.*' => 'required|file|max:2048',
            'sertifikat' => 'required|file|mimes:pdf|max:2048'
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $user = Auth::user();
        $user_id = $user->id;

        $data = [
            'id_pengguna' => $user_id,
            'status' => $request->status,
            'nama_pengetahuan' => $request->nama_pengetahuan,
            'penyelenggara' => $request->penyelenggara,
            'jenis' => 'serkom',
            'bidang' => implode(',', $request->bidang),
            //'bidang_lain' => $request->bidang_lain;
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya,
            // 'materi' => $pathdok . $filenamedok,
            // 'sertifikat' => $pathsert . $filenamesert
        ];

        $serkom = SertifikasiKompetensiModel::create($data);

        // handle file sertifikat
        if ($request->has('sertifikat')) {
            $filesert = $request->file('sertifikat');
            $filenameoriginalsert = $filesert->getClientOriginalName();
            $extensionsert = $filesert->getClientOriginalExtension();

            $filenamesert = $filenameoriginalsert . '.' . $extensionsert;

            $pathsert = 'uploads/serkom/sertifikat/';
            $filesert->move($pathsert, $filenamesert);

            //$filename = $file->store('uploads/materi');
            $serkom->sertifikat()->create([
                'file_path' => $pathsert . $filenamesert,
                'file_name' => $filenameoriginalsert,
            ]);
        }

        // Upload setiap file materi dan simpan ke database
        if ($request->hasfile('materi')) {
            foreach ($request->file('materi') as $file) {

                //$filemat = $request->file('sertifikat');

                $filenameoriginalmat = $file->getClientOriginalName();
                $extensionmat = $file->getClientOriginalExtension();

                $filenamemat = $filenameoriginalmat . '.' . $extensionmat;

                $pathmat = 'uploads/serkom/materi/';
                $file->move($pathmat, $filenamemat);

                //$filename = $file->store('uploads/materi');
                $serkom->materi()->create([
                    'file_path' => $pathmat . $filenamemat,
                    'file_name' => $filenameoriginalmat,
                ]);
            }
        }

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
        })->where('id', '!=', $loggedInUser->id)->get();

        // Mendapatkan user level 1 kecuali user yang sudah ada di daftar notifikasi
        $levelOneUsers = User::where('level', 1)
            ->whereNotIn('id', $usersWithSameField->pluck('id'))
            ->where('id', '!=', $loggedInUser->id)
            ->get();

        // Membuat pesan notifikasi untuk user dengan bidang yang sama
        $commonFieldMessage = $serkom->users->name . ' telah menambahkan Pengetahuan Sertifikasi Kompetensi baru ' .
            ' dengan nama ' . $serkom->nama_pengetahuan;

        // Mengirim notifikasi ke user dengan bidang yang sama
        foreach ($usersWithSameField as $user) {
            Carbon::setLocale('id');
            date_default_timezone_set('Asia/Jakarta');
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            $user->notify(new InputSerkomNotif($serkom, $commonFieldMessage, $waktu));
            $user->has_new_notifications = true;
            $user->save();
        }

        // Membuat pesan notifikasi untuk user level 1
        $levelOneMessage = $serkom->users->name . ' telah menambahkan Pengetahuan Sertifikasi Kompetensi baru ' .
            ' dengan nama ' . $serkom->nama_pengetahuan;

        // Mengirim notifikasi ke user level 1
        foreach ($levelOneUsers as $user) {
            Carbon::setLocale('id');
            date_default_timezone_set('Asia/Jakarta');
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            $user->notify(new InputSerkomNotif($serkom, $levelOneMessage, $waktu));
            $user->has_new_notifications = true;
            $user->save();
        }

        // Mengirim notifikasi ke user yang login (user yang melakukan input)
        $loggedInUserMessage = 'Anda telah menambahkan Pengetahuan Sertifikasi Kompetensi baru ' .
            ' dengan nama ' . $serkom->nama_pengetahuan;
        //$loggedInUser->notify(new InputSerkomNotif($pelatihan, $loggedInUserMessage));
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        $waktu = Carbon::now()->format('d-m-Y H:i:s');
        Notification::send($loggedInUser, new InputSerkomNotif($serkom, $loggedInUserMessage, $waktu));
        $loggedInUser->has_new_notifications = true;
        $loggedInUser->save();

        // redirect ke indedx table pengetahuan serkom
        return redirect()->route('serkom.index');
    }

    // Method untuk mendownload file materi
    public function downloadmat($id)
    {
        $filemat = MateriSerkomModel::findOrFail($id);
        $public_path = '/home/simpasko/public_html/';
        $pathmat = $public_path . $filemat->file_path;

        return response()->download($pathmat);
    }

    // Method untuk mendownload file sertifikat
    public function downloadsert($id)
    {
        $filesert = SertifikatSerkomModel::findOrFail($id);
        $public_path = '/home/simpasko/public_html/';
        $pathsert = $public_path . $filesert->file_path;
        

        return response()->download($pathsert);
    }

    public function edit(Request $request, $id)
    {
        $data = SertifikasiKompetensiModel::find($id);
        $bidangstring = $data->bidang;
        $bidang = explode(',', $bidangstring);

        $materi = MateriSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
        $sertifikat = SertifikatSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
        return view('Admin/serkom/edit', compact('data', 'bidang', 'materi', 'sertifikat'));
    }

    public function update(Request $request, $id)
    {

        $serkom = SertifikasiKompetensiModel::find($id);
        $materi = MateriSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();
        $sertifikat = SertifikatSerkomModel::where('sertifikasi_kompetensi_model_id', $id)->get();

        //dd($request->all());

        $request->validate([
            'nama_pengetahuan' => 'required',
            'bidang' => 'required|array',
            'penyelenggara' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
            'materi.*' => 'required|file',
            //'sertifikat' => 'required|file'
        ]);

        $data = [
            // 'id_pengguna' => $request->id_pengguna,
            'status' => $request->status,
            'nama_pengetahuan' => $request->nama_pengetahuan,
            'penyelenggara' => $request->penyelenggara,
            'bidang' => implode(',', $request->bidang),
            //'bidang_lain' => $request->bidang_lain;
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya,
            // 'materi' => $pathdok . $filenamedok,
            // 'sertifikat' => $pathsert . $filenamesert
        ];

        // handle file sertifikat
        if ($request->has('sertifikat')) {
            foreach ($request->file('sertifikat')  as $key => $filesert) {
                $filenameoriginalsert = $filesert->getClientOriginalName();
                $extensionsert = $filesert->getClientOriginalExtension();

                $filenamesert = $filenameoriginalsert . '.' . $extensionsert;

                $pathsert = 'uploads/serkom/sertifikat/';
                $filesert->move($pathsert, $filenamesert);

                // Check if this sertifikat already exists and update it
                if (isset($request->sertifikat_ids[$key])) {
                    $sertifikat = SertifikatSerkomModel::find($request->sertifikat_ids[$key]);
                    if ($sertifikat) {
                        // Delete old file if exists
                        Storage::delete($sertifikat->file_path);

                        $sertifikat->update([
                            'file_path' => $pathsert . $filenamesert,
                            'file_name' => $filenameoriginalsert,
                        ]);
                    }
                } else {
                    // Create new sertifikat record
                    SertifikatSerkomModel::create([
                        'sertifikasi_kompetensi_model_id' => $id,
                        'file_path' => $pathsert . $filenamesert,
                        'file_name' => $filenameoriginalsert,
                    ]);
                }
            }
        }

        if ($request->hasFile('materi')) {
            foreach ($request->file('materi')  as $key => $file) {
                $filenameoriginalmat = $file->getClientOriginalName();
                $extensionmat = $file->getClientOriginalExtension();

                $filenamemat = $filenameoriginalmat . '.' . $extensionmat;

                $pathmat = 'uploads/serkom/materi/';
                $file->move($pathmat, $filenamemat);

                // Check if this materi already exists and update it
                if (isset($request->materi_ids[$key])) {
                    $materi = MateriSerkomModel::find($request->materi_ids[$key]);
                    if ($materi) {
                        // Delete old file if exists
                        Storage::delete($materi->file_path);

                        $materi->update([
                            'file_path' => $pathmat . $filenamemat,
                            'file_name' => $filenameoriginalmat,
                        ]);
                    }
                } else {
                    // Create new Materi record
                    MateriSerkomModel::create([
                        'sertifikasi_kompetensi_model_id' => $id,
                        'file_path' => $pathmat . $filenamemat,
                        'file_name' => $filenameoriginalmat,
                    ]);
                }
            }
        }
        //$materi->update($request->all());

        // Update serkom
        $serkom->update($data);

        // redirect ke indedx table pengetahuan serkom
        return redirect()->route('serkom.index');
    }

    public function delete_materi($id)
    {
        // Temukan data berdasarkan id
        $post = MateriSerkomModel::find($id);
        $id = $post->sertifikasi_kompetensi_model_id;

        // Hapus data jika ditemukan
        if ($post) {
            $post->delete();

            // redirect ke indedx table pengetahuan serkom
            return redirect()->route('serkom.edit', ['id' => $id]);
        }
    }

    public function update_materi(Request $request, $id)
    {
        $request->validate([
            'materi.*' => 'file|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        $materi = MateriSerkomModel::find($id);

        if ($request->hasFile('materi')) {
            foreach ($request->file('materi') as $file) {
                $filenameoriginalmat = $file->getClientOriginalName();
                $extensionmat = $file->getClientOriginalExtension();

                $filenamemat = $filenameoriginalmat . '.' . $extensionmat;

                $pathmat = 'uploads/serkom/materi/';
                $file->move($pathmat, $filenamemat);

                $materi->file_path = $pathmat . $filenamemat;
                $materi->file_name = $filenameoriginalmat;
            }
        }

        $materi->save();
        return redirect()->route('serkom.index')->with('success', 'Materi updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan id
        $post = SertifikasiKompetensiModel::find($id);

        // Hapus data jika ditemukan
        if ($post) {
            $post->delete();
            // redirect ke indedx table pengetahuan serkom
            return redirect()->route('serkom.index');
        }
    }
}
