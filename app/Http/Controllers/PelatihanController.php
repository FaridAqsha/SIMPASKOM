<?php

namespace App\Http\Controllers;

use App\Models\MateriPelatihanModel;
use App\Models\PelatihanModel;
use App\Models\SertifikatPelatihanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Notifications\InputPelatihanNotif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $data = PelatihanModel::join('users', 'pelatihan.id_pengguna', '=', 'users.id')
                ->where(function ($query) use ($search) {
                    $query->where('pelatihan.id', 'like', '%' . $search . '%')
                        ->orWhere('pelatihan.nama_pengetahuan', 'like', '%' . $search . '%')
                        ->orWhere('pelatihan.bidang', 'like', '%' . $search . '%')
                        ->orWhere('pelatihan.status', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                })
                ->select('pelatihan.*', 'users.name as user_name')
                ->paginate(5);
        } else {
            $data = PelatihanModel::sortable()->latest()->paginate(5);
        }

        // Gantikan koma dengan <br> pada nilai bidang
        foreach ($data as $item) {
            $item->bidang = str_replace(',', '<br>', $item->bidang);
        }

        // $data = PelatihanModel::paginate(4);
        // $data = PelatihanModel::get();
        return view('Admin/pelatihan/pelatihan', compact('data', 'search'));
    }

    public function detail_pelatihan(Request $request, $id)
    {
        $data = PelatihanModel::find($id);
        $bidangstring = $data->bidang;
        $bidang = explode(',', $bidangstring);

        $materi = MateriPelatihanModel::where('pelatihan_model_id', $id)->get();
        $sertifikat = SertifikatPelatihanModel::where('pelatihan_model_id', $id)->get();

        //dd($data);
        return view('Admin/pelatihan/detail', compact('data', 'bidang', 'materi', 'sertifikat'));
    }

    public function create_pelatihan()
    {
        return view('Dosen/pelatihan/input');
    }

    public function store_pelatihan(Request $request)
    {
        //dd($request->all());

        // validation untuk form input
        $validator = Validator::make($request->all(), [
            'nama_pengetahuan' => 'required',
            'bidang' => 'required|array',
            'waktu' => 'required',
            'penyelenggara' => 'required',
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
            'jenis' => 'pelatihan',
            'bidang' => implode(',', $request->bidang),
            //'bidang_lain' => $request->bidang_lain;
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'biaya' => $request->biaya,
            // 'materi' => $pathdok . $filenamedok,
            // 'sertifikat' => $pathsert . $filenamesert
        ];

        $pelatihan = PelatihanModel::create($data);

        // handle file sertifikat
        if ($request->has('sertifikat')) {
            $filesert = $request->file('sertifikat');
            $filenameoriginalsert = $filesert->getClientOriginalName();
            $extensionsert = $filesert->getClientOriginalExtension();

            $filenamesert = $filenameoriginalsert . '.' . $extensionsert;

            $pathsert = 'uploads/sertifikat/';
            $filesert->move($pathsert, $filenamesert);

            //$filename = $file->store('uploads/materi');
            $pelatihan->sertifikat()->create([
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

                $pathmat = 'uploads/materi/';
                $file->move($pathmat, $filenamemat);

                //$filename = $file->store('uploads/materi');
                $pelatihan->materi()->create([
                    'file_path' => $pathmat . $filenamemat,
                    'file_name' => $filenameoriginalmat,
                ]);
            }
        }

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
        })->where('id', '!=', $loggedInUser->id)->get();

        // Mendapatkan user level 1 kecuali user yang sudah ada di daftar notifikasi
        $levelOneUsers = User::where('level', 1)
            ->whereNotIn('id', $usersWithSameField->pluck('id'))
            ->where('id', '!=', $loggedInUser->id)
            ->get();

        // Membuat pesan notifikasi untuk user dengan bidang yang sama
        $commonFieldMessage = $pelatihan->users->name . ' telah menambahkan Pengetahuan Pelatihan baru ' .
            ' dengan nama ' . $pelatihan->nama_pengetahuan;

        // Mengirim notifikasi ke user dengan bidang yang sama
        foreach ($usersWithSameField as $user) {
            Carbon::setLocale('id');
            date_default_timezone_set('Asia/Jakarta');
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            $user->notify(new InputPelatihanNotif($pelatihan, $commonFieldMessage, $waktu));
            $user->has_new_notifications = true;
            $user->save();
        }

        // Membuat pesan notifikasi untuk user level 1
        $levelOneMessage = $pelatihan->users->name . ' telah menambahkan Pengetahuan Pelatihan baru ' .
            ' dengan nama ' . $pelatihan->nama_pengetahuan;

        // Mengirim notifikasi ke user level 1
        foreach ($levelOneUsers as $user) {
            Carbon::setLocale('id');
            date_default_timezone_set('Asia/Jakarta');
            $waktu = Carbon::now()->format('d-m-Y H:i:s');
            $user->notify(new InputPelatihanNotif($pelatihan, $levelOneMessage, $waktu));
            $user->has_new_notifications = true;
            $user->save();
        }

        // Mengirim notifikasi ke user yang login (user yang melakukan input)
        $loggedInUserMessage = 'Anda telah menambahkan Pengetahuan Pelatihan baru ' .
            ' dengan nama ' . $pelatihan->nama_pengetahuan;
        //$loggedInUser->notify(new InputPelatihanNotif($pelatihan, $loggedInUserMessage));
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        $waktu = Carbon::now()->format('d-m-Y H:i:s');
        Notification::send($loggedInUser, new InputPelatihanNotif($pelatihan, $loggedInUserMessage, $waktu));
        $loggedInUser->has_new_notifications = true;
        $loggedInUser->save();


        // redirect ke indedx table pengetahuan pelatihan
        return redirect()->route('pelatihan.index');
    }


    // Method untuk mendownload file
    public function downloadmat($id)
    {
        $filemat = MateriPelatihanModel::findOrFail($id);
        $public_path = '/home/simpasko/public_html/';
        $pathmat = $public_path . $filemat->file_path;

        return response()->download($pathmat);
    }

    // Method untuk mendownload file
    public function downloadsert($id)
    {
        $filesert = SertifikatPelatihanModel::findOrFail($id);
        $public_path = '/home/simpasko/public_html/';
        $pathsert = $public_path . $filesert->file_path;

        return response()->download($pathsert);
    }

    public function edit(Request $request, $id)
    {
        $data = PelatihanModel::find($id);
        $bidangstring = $data->bidang;
        $bidang = explode(',', $bidangstring);

        $materi = MateriPelatihanModel::where('pelatihan_model_id', $id)->get();
        $sertifikat = SertifikatPelatihanModel::where('pelatihan_model_id', $id)->get();
        return view('Admin/pelatihan/edit', compact('data', 'bidang', 'materi', 'sertifikat'));
    }

    public function update(Request $request, $id)
    {

        $pelatihan = PelatihanModel::find($id);
        $materi = MateriPelatihanModel::where('pelatihan_model_id', $id)->get();
        $sertifikat = SertifikatPelatihanModel::where('pelatihan_model_id', $id)->get();

        //dd($request->all());

        $request->validate([
            'nama_pengetahuan' => 'required',
            'bidang' => 'required|array',
            'waktu' => 'required',
            'penyelenggara' => 'required',
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

                $pathsert = 'uploads/sertifikat/';
                $filesert->move($pathsert, $filenamesert);

                // Check if this sertifikat already exists and update it
                if (isset($request->sertifikat_ids[$key])) {
                    $sertifikat = SertifikatPelatihanModel::find($request->sertifikat_ids[$key]);
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
                    SertifikatPelatihanModel::create([
                        'pelatihan_model_id' => $pelatihan->id,
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

                $pathmat = 'uploads/materi/';
                $file->move($pathmat, $filenamemat);

                // Check if this materi already exists and update it
                if (isset($request->materi_ids[$key])) {
                    $materi = MateriPelatihanModel::find($request->materi_ids[$key]);
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
                    MateriPelatihanModel::create([
                        'pelatihan_model_id' => $pelatihan->id,
                        'file_path' => $pathmat . $filenamemat,
                        'file_name' => $filenameoriginalmat,
                    ]);
                }
            }
        }
        //$materi->update($request->all());

        // Update Pelatihan
        $pelatihan->update($data);

        // redirect ke indedx table pengetahuan pelatihan
        return redirect()->route('pelatihan.index');
    }

    public function delete_materi($id)
    {
        // Temukan data berdasarkan id
        $post = MateriPelatihanModel::find($id);
        $id = $post->pelatihan_model_id;

        // Hapus data jika ditemukan
        if ($post) {
            $post->delete();

            // redirect ke indedx table pengetahuan pelatihan
            return redirect()->route('pelatihan.edit', ['id' => $id]);
        }
    }

    public function update_materi(Request $request, $id)
    {
        $request->validate([
            'materi.*' => 'file|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        $materi = MateriPelatihanModel::find($id);

        if ($request->hasFile('materi')) {
            foreach ($request->file('materi') as $file) {
                $filenameoriginalmat = $file->getClientOriginalName();
                $extensionmat = $file->getClientOriginalExtension();

                $filenamemat = $filenameoriginalmat . '.' . $extensionmat;

                $pathmat = 'uploads/materi/';
                $file->move($pathmat, $filenamemat);

                $materi->file_path = $pathmat . $filenamemat;
                $materi->file_name = $filenameoriginalmat;
            }
        }

        $materi->save();

        return redirect()->route('pelatihan.index')->with('success', 'Materi updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan id
        $post = PelatihanModel::find($id);

        // Hapus data jika ditemukan
        if ($post) {
            $post->delete();

            // redirect ke indedx table pengetahuan pelatihan
            return redirect()->route('pelatihan.index');
        }
    }
}
