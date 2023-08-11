<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function caleg()
    {
        $identitas = Identitas::all();
        $setting = Setting::where('status', 1)->get();

        return view('pages.app', compact('identitas', 'setting'));
    }
}
