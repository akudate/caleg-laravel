<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function caleg()
    {
        $identitas = Identitas::all();

        return view('pages.app', compact('identitas'));
    }
    public function profile()
    {
        $identitas = Identitas::all();

        return view('pages.profile', compact('identitas'));
    }
    public function berita()
    {
        $identitas = Identitas::all();
        return view('pages.berita', compact('identitas'));
    }
}
