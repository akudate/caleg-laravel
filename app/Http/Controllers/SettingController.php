<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::get();

        return view('pages.setting', compact('setting'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'partai'    => 'required',
        //     'warna'   => 'required',
        // ]);

        Setting::insert([
            'partai'    => $request->partai,
            'warna'   => $request->warna,
        ]);
        return redirect('admin/setting')->with('success', 'setting Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        // $request->validate([
        //     'partai'    => 'required',
        //     'warna'   => 'required',
        // ]);

        Setting::where('id', $request->id)->update([
            'partai'    => $request->partai,
            'warna'   => $request->warna,
        ]);
        return redirect('admin/setting')->with('success', 'setting Berhasil Diedit');
    }
    public function updateStatus(Request $request)
    {
        $id = $request->input('id');

        // Ubah semua status menjadi 0
        Setting::where('status', 1)->update(['status' => 0]);

        // Ubah status pada data dengan ID terpilih menjadi 1
        Setting::where('id', $id)->update(['status' => 1]);

        return redirect('admin/setting')->with('success', 'setting Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Setting::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/setting')->with('success', 'setting Berhasil Dihapus');
        }
    }
}
