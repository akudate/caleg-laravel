<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
use App\Models\Identitas;
use Illuminate\Http\Request;
use App\Models\Dukungan;
use App\Models\Setting;
use App\Models\Profile;

class IdentitasController extends Controller
{
    public function caleg()
    {
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data

        return view('pages.app', compact('profile', 'partai'));
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
    public function dukungan()
    {
        $identitas = Identitas::all();
        $dukungan = Dukungan::orderBy('created_at','desc')->paginate(6);
        $jumlah = Dukungan::get()->count();
        return view('pages.dukungan', compact('identitas','dukungan','jumlah'));
    }
    public function storeDukungan(Request $request)
    {
        $request->validate([
            'pesan'   => 'required',
            'nama'    => 'required',
            'email'   => 'required',
        ]);

        Dukungan::insert([
            'pesan'   => $request->pesan,
            'nama'    => $request->nama,
            'email'   => $request->email,
        ]);
        return redirect('/dukungan')->with('success', 'Dukungan Berhasil Dibuat');
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
