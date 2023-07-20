<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile', compact('profile'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'title'         => 'required',
            'alamat_kantor' => 'required',
            'kontak'        => 'required',
            'biografi'      => 'required',
            'image'         => 'required',
        ]);

        $image = $request->image;
        $rename = date('dmYHis') . "." . $image->extension();
        $image->move('profile_image', $rename);

        Profile::insert([
            'nama'          => $request->nama,
            'title'         => $request->title,
            'alamat_kantor' => $request->alamat_kantor,
            'kontak'        => $request->kontak,
            'biografi'      => $request->biografi,
            'image'         => $rename,
        ]);
        return redirect('admin/profile')->with('success', 'Profile Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'title'         => 'required',
            'alamat_kantor' => 'required',
            'kontak'        => 'required',
            'biografi'      => 'required',
        ]);

        if($request->file("image") != NULL) {
            $image = $request->image;
            $rename = date('dmYHis') . "." . $image->extension();
            $image->move('profile_image', $rename);

            Profile::where('id', $request->id)->update([
                'nama'          => $request->nama,
                'title'         => $request->title,
                'alamat_kantor' => $request->alamat_kantor,
                'kontak'        => $request->kontak,
                'biografi'      => $request->biografi,
                'image'         => $rename,
            ]);
        }else{
            Profile::where('id', $request->id)->update([
                'nama'          => $request->nama,
                'title'         => $request->title,
                'alamat_kantor' => $request->alamat_kantor,
                'kontak'        => $request->kontak,
                'biografi'      => $request->biografi,
            ]);
        }
        return redirect('admin/profile')->with('success', 'Profile Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Profile::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/profile')->with('success', 'Profile Berhasil Dihapus');
        }
    }
}
