<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $userlevel = Auth()->user()->level;

            if ($userlevel == 1) {
                return redirect()->route('admin.dashboard')->with([
                    'user' => Auth::user()
                ]);
            } else if ($userlevel == 2) {
                return redirect()->route('user.dashboard')->with([
                    'user' => Auth::user()
                ]);
            } else {
                return redirect()->back();
            }
        }
    }
}
