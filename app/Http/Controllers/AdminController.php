<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function identitas(){
        $identitas = Identitas::all();
        return view('admin.home',compact('identitas'));
    }
    public function store(Request $request){
        $request->validate([
            'nama'      => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'afiliasi'  => 'required',
            'image'     => 'required',
        ]);

        $image = $request->image;
        $rename = date('dmYHis') . "." . $image->extension();
        $image->move('image', $rename);

        Identitas::insert([
            'nama'      => $request->nama,
            'visi'      => $request->visi,
            'misi'      => $request->misi,
            'afiliasi'  => $request->afiliasi,
            'image'     => $rename,
        ]);
        return redirect('admin/identitas')->with('success', 'Identitas Berhasil Dibuat');
    }
    public function update(Request $request){
        $request->validate([
            'nama'      => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'afiliasi'  => 'required',
        ]);

        if($request->file("image") != NULL ){
            $image = $request->image;
            $rename = date('dmYHis') . "." . $image->extension();
            $image->move('image', $rename);

            Identitas::where('id',$request->id)->update([
                'nama'      => $request->nama,
                'visi'      => $request->visi,
                'misi'      => $request->misi,
                'afiliasi'  => $request->afiliasi,
                'image'     => $rename,
            ]);
        }else{
            Identitas::where('id',$request->id)->update([
                'nama'      => $request->nama,
                'visi'      => $request->visi,
                'misi'      => $request->misi,
                'afiliasi'  => $request->afiliasi,
            ]);
        }
        return redirect('admin/identitas')->with('success', 'Identitas Berhasil Diedit');
    }
    public function delete(Request $request){
        $del = Identitas::where('id',$request->id)->delete();
        if($del){
            return redirect('admin/identitas')->with('success', 'Identitas Berhasil Dihapus');
        }
    }
}
