<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Profile;
use App\Models\Setting;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function berita()
    {
        $berita = Berita::where('id_caleg', 62)->get();
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data


        return view('pages.berita', compact('berita', 'profile', 'partai'));
    }

    public function detail_berita($id_news)
    {
        $berita = Berita::find($id_news);
        $profile = Profile::where('id_caleg', 62)->first(); // Menggunakan first() untuk mengambil satu data
        $partai = Setting::where('id_partai', 23)->get(); // Menggunakan get() untuk mengambil data

        return view('pages.detailBerita', compact('berita', 'profile','partai'));
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
