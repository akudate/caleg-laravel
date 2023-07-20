<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.berita', compact('berita'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'image'      => 'required',
            'kategori'   => 'required',
        ]);

        $image = $request->image;
        $rename = date('dmYHis') . "." . $image->extension();
        $image->move('berita_image', $rename);

        Berita::insert([
            'judul'       => $request->judul,
            'image'       => $rename,
            'kategori'    => $request->kategori,
        ]);
        return redirect('admin/berita')->with('success', 'Berita Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'kategori'   => 'required',
        ]);

        if($request->file("image") != NULL) {
            $image = $request->image;
            $rename = date('dmYHis') . "." . $image->extension();
            $image->move('berita_image', $rename);

            Berita::where('id', $request->id)->update([
                'judul'       => $request->judul,
                'image'       => $rename,
                'kategori'    => $request->kategori,
            ]);
        }else{
            Berita::where('id', $request->id)->update([
                'judul'       => $request->judul,
                'kategori'    => $request->kategori,
            ]);
        }
        return redirect('admin/berita')->with('success', 'Berita Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Berita::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/berita')->with('success', 'Berita Berhasil Dihapus');
        }
    }
}
