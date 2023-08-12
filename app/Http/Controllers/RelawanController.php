<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Setting;
use App\Models\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function relawan()
    {
        $relawan = Relawan::where('id_caleg', 62)->first();
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data

        return view('pages.relawan', compact('relawan', 'profile', 'partai'));
    }
    public function store(Request $request)
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
        return redirect('admin/relawan')->with('success', 'Relawan Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required',
            'no_hp'   => 'required',
            'pesan'   => 'required',
        ]);

        Relawan::where('id', $request->id)->update([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'no_hp'   => $request->no_hp,
            'pesan'   => $request->pesan,
        ]);
        return redirect('admin/relawan')->with('success', 'Relawan Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Relawan::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/relawan')->with('success', 'Relawan Berhasil Dihapus');
        }
    }
}
