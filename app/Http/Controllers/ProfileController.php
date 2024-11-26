<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function detail_profile(Request $request, $id)
    {
        $data = User::find($id);
        $bidangstring = $data->k_bidang;
        $k_bidang = explode(',', $bidangstring);

        //dd($data);
        return view('Admin/profile/profile', compact('data', 'k_bidang'));
    }

    public function edit_profile(Request $request, $id)
    {
        $data = User::find($id);
        $bidangstring = $data->k_bidang;
        $k_bidang = explode(',', $bidangstring);

        return view('Admin/profile/edit', compact('data', 'k_bidang'));
    }

    public function update_profile(Request $request, $id)
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
        return redirect()->route('home');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
