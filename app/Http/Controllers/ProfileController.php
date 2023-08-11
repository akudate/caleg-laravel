<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::where('id_caleg', 62);
        $partai = Setting::where('id_partai', 23);

        return view('pages.profile', compact('profile', 'partai'));
    }
}
