<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function caleg()
    {
        $identitas = Identitas::all();

        return view('pages.app', compact('identitas'));
    }
}
