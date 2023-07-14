<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function identitas()
    {
        $identitas = Identitas::all();
        return view('admin.home', compact('identitas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'afiliasi'  => 'required',
            'image'     => 'required',
            'afiliasi_image'     => 'required',
        ]);

        $image = $request->image;
        $rename = date('dmYHis') . "." . $image->extension();
        $image->move('image', $rename);

        $afiliasi_image = $request->afiliasi_image;
        $reedit = date('dmYHis') . "." . $afiliasi_image->extension();
        $afiliasi_image->move('afiliasi_image', $reedit);

        Identitas::insert([
            'nama'      => $request->nama,
            'visi'      => $request->visi,
            'misi'      => $request->misi,
            'afiliasi'  => $request->afiliasi,
            'image'     => $rename,
            'afiliasi_image' => $reedit,
        ]);
        return redirect('admin/identitas')->with('success', 'Identitas Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'afiliasi'  => 'required',
            'afiliasi_image'  => 'required',
        ]);

        if ($request->file("image") != NULL) {
            $image = $request->image;
            $rename = date('dmYHis') . "." . $image->extension();
            $image->move('image', $rename);

            Identitas::where('id', $request->id)->update([
                'nama'      => $request->nama,
                'visi'      => $request->visi,
                'misi'      => $request->misi,
                'afiliasi'  => $request->afiliasi,
                'image'     => $rename,
            ]);
        } elseif ($request->file("afiliasi_image") != NULL) {
            $afiliasi_image = $request->afiliasi_image;
            $reedit = date('dmYHis') . "." . $afiliasi_image->extension();
            $afiliasi_image->move('afiliasi_image', $reedit);

            Identitas::where('id', $request->id)->update([
                'nama'      => $request->nama,
                'visi'      => $request->visi,
                'misi'      => $request->misi,
                'afiliasi'  => $request->afiliasi,
                'afiliasi_image'     => $reedit,
            ]);
        } else {
            Identitas::where('id', $request->id)->update([
                'nama'      => $request->nama,
                'visi'      => $request->visi,
                'misi'      => $request->misi,
                'afiliasi'  => $request->afiliasi,
            ]);
        }
        return redirect('admin/identitas')->with('success', 'Identitas Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Identitas::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/identitas')->with('success', 'Identitas Berhasil Dihapus');
        }
    }
}
