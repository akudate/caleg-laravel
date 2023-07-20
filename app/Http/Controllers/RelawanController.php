<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function index()
    {
        $relawan = Relawan::all();
        return view('admin.relawan', compact('relawan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required',
            'no_hp'   => 'required',
            'pesan'   => 'required',
        ]);

        Relawan::insert([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'no_hp'   => $request->no_hp,
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
