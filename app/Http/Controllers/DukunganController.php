<?php

namespace App\Http\Controllers;

use App\Models\Dukungan;
use App\Models\Profile;
use App\Models\Setting;
use Illuminate\Http\Request;

class DukunganController extends Controller
{
    public function dukungan()
    {
        $dukungan = Dukungan::orderBy('id_dukungan', 'desc')->paginate(6);
        $jumlah = Dukungan::get()->count();
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data

        return view('pages.dukungan', compact('dukungan', 'jumlah', 'profile', 'partai'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'pesan'   => 'required',
        //     'nama'    => 'required',
        //     'email'   => 'required',
        //     'email'   => 'required',
        // ]);

        Dukungan::insert([
            'pesan'   => $request->pesan,
            'nama'    => $request->nama,
            'email'   => $request->email,
            'id_caleg'   => $request->id_caleg,

        ]);
        return redirect('pages.dukungan')->with('success', 'Dukungan Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'pesan'   => 'required',
            'nama'    => 'required',
            'email'   => 'required',
        ]);

        Dukungan::where('id', $request->id)->update([
            'pesan'   => $request->pesan,
            'nama'    => $request->nama,
            'email'   => $request->email,
        ]);
        return redirect('admin/dukungan')->with('success', 'Dukungan Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Dukungan::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/dukungan')->with('success', 'Dukungan Berhasil Dihapus');
        }
    }
}
