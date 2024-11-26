<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AkunController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->query('search');

        if (!empty($search)) {
            $data = User::where('users.id', 'like', '%' . $search . '%')
                ->orWhere('users.name', 'like', '%' . $search . '%')
                ->orWhere('users.jabatan', 'like', '%' . $search . '%')
                ->orWhere('users.k_bidang', 'like', '%' . $search . '%')
                ->paginate(4);
        } else {
            $data = User::sortable()->paginate(5);
        }

        return view('Admin/akun/akun', compact('data', 'search'));
    }

    public function detail_akun(Request $request, $id)
    {
        $data = User::find($id);
        $bidangstring = $data->k_bidang;
        $k_bidang = explode(',', $bidangstring);

        //dd($data);
        return view('Admin/akun/detail', compact('data', 'k_bidang'));
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        $bidangstring = $data->k_bidang;
        $k_bidang = explode(',', $bidangstring);

        return view('Admin/akun/edit', compact('data', 'k_bidang'));
    }

    public function update(Request $request, $id)
    {

        $akun = User::find($id);

        //dd($request->all());

        // $request->validate([
        //     'name' => 'required',
        //     'level' => 'required',
        //     'jabatan' => 'required',
        //     'k_bidang' => 'required|array',
        //     'email' => 'required|email'
        // ]);

        $data = [
            // 'id_pengguna' => $request->id_pengguna,
            'name' => $request->name,
            'level' => $request->level,
            'k_bidang' => implode(',', $request->k_bidang),
            'jabatan' => $request->jabatan,
            'email' => $request->email
        ];

        // Update Pelatihan
        $akun->update($data);

        // redirect ke indedx table pengetahuan pelatihan
        return redirect()->route('akun.index');
    }
    
    //notif badge
    public function markAsRead(Request $request)
    {
        $user = Auth::user();
        $user->has_new_notifications = false;
        $user->save();

        return response()->json(['status' => 'success']);
    }
}
