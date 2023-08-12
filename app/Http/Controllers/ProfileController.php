<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data


        return view('pages.profile', compact('profile', 'partai'));
    }
}
