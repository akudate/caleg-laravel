<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('admin.agenda', compact('agenda'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tanggal'  => 'required',
            'jam'      => 'required',
            'agenda'   => 'required',
            'lokasi'   => 'required',
        ]);

        Agenda::insert([
            'tanggal'  => $request->tanggal,
            'jam'      => $request->jam,
            'agenda'   => $request->agenda,
            'lokasi'   => $request->lokasi,
        ]);
        return redirect('admin/agenda')->with('success', 'Agenda Berhasil Dibuat');
    }
    public function update(Request $request)
    {
        $request->validate([
            'tanggal'  => 'required',
            'jam'      => 'required',
            'agenda'   => 'required',
            'lokasi'   => 'required',
        ]);

        Agenda::where('id', $request->id)->update([
            'tanggal'  => $request->tanggal,
            'jam'      => $request->jam,
            'agenda'   => $request->agenda,
            'lokasi'   => $request->lokasi,
        ]);
        return redirect('admin/agenda')->with('success', 'Agenda Berhasil Diedit');
    }
    public function delete(Request $request)
    {
        $del = Agenda::where('id', $request->id)->delete();
        if ($del) {
            return redirect('admin/agenda')->with('success', 'Agenda Berhasil Dihapus');
        }
    }
}
