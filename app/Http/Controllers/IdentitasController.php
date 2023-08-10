<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
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
    public function relawan()
    {
        $identitas = Identitas::all();
        return view('pages.relawan', compact('identitas'));
    }
    public function storeRelawan(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required',
            'no_hp'   => 'required',
            'judul'   => 'required',
            'pesan'   => 'required',
        ]);

        Relawan::insert([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'no_hp'   => $request->no_hp,
            'judul'   => $request->judul,
            'pesan'   => $request->pesan,
        ]);
        return redirect('/relawan')->with('success', 'Relawan Berhasil Dibuat');
    }
}
