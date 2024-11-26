<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $registeredUser = User::where('google_id', $socialUser->id)->first();

        $oriava = $socialUser->avatar;
        $clearing = ['=s96-c'];

        $ava = str_replace($clearing, '', $oriava);


        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'avatar' => $ava,
                'email' => $socialUser->email,
                'level' => 2,
                'password' => Hash::make('123'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect()->route('jabatan.fill', ['id' => $user->id, 'user' => $user]);
        }

        Auth::login($registeredUser);

        return redirect('/home');
    }

    public function fill_jabatan(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth/fill_jabatan', compact('user'));
    }

    public function update_jabatan(Request $request, $id)
    {

        $user = User::find($id);

        //dd($request->all());

        // $request->validate([
        //     'jabatan' => 'required',
        // ]);

       $validator = Validator::make($request->all(), [
            'jabatan' => 'required',
        ]);

        $data = [
            'jabatan' => $request->jabatan
        ];
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


        // Update akun
        $user->update($data);

        // view ke fill fill_bidang
        return redirect()->route('bidang.fill', ['id' => $user->id, 'user' => $user]);
    }

    public function fill_bidang(Request $request, $id)
    {
        $akun = User::find($id);
        return view('auth/fill_bidang', compact('akun'));
    }

    public function update_bidang(Request $request, $id)
    {

        $user = User::find($id);

         $validator = Validator::make($request->all(), [
            'k_bidang' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Pastikan k_bidang adalah array sebelum menggunakannya
        $k_bidang = $request->input('k_bidang', []);

        $data = [
            'k_bidang' => is_array($k_bidang) ? implode(',', $k_bidang) : '',
        ];

        // Update akun
        $user->update($data);

        Auth::login($user);

        // view ke fill fill_bidang
        return redirect('/home');
    }
}
