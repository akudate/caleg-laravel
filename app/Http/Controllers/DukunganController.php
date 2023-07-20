<?php

namespace App\Http\Controllers;

use App\Models\Dukungan;
use Illuminate\Http\Request;

class DukunganController extends Controller
{
    public function index()
    {
        $dukungan = Dukungan::all();
        return view('admin.dukungan', compact('dukungan'));
    }
    public function store(Request $request)
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
        return redirect('admin/dukungan')->with('success', 'Dukungan Berhasil Dibuat');
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
