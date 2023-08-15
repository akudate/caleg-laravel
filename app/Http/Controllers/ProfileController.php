<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Profile;
use App\Models\Medsos;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data

        $fb = Medsos::where('id_caleg', 62)->where('type', 'Facebook')->first();
        $ig = Medsos::where('id_caleg', 62)->where('type', 'Instagram')->first();
        $tiktok = Medsos::where('id_caleg', 62)->where('type', 'Tiktok')->first();
        $yt = Medsos::where('id_caleg', 62)->where('type', 'Youtube')->first();

        return view('pages.profile', compact('profile', 'partai', 'fb', 'ig', 'tiktok', 'yt'));
    }
}
