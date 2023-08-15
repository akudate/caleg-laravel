<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedsosController extends Controller
{
    public function medsos() {
        $medsos = Medsos::where('id_caleg', 62)->get();
    }
}
