<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function postLogin(request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Session::put([
                'username' => Auth::user()->username,
                'password' => Auth::user()->password,
            ]);
            return redirect('admin/identitas');
        }
            return redirect()->back()->with('message', 'Username or Password is Wrong');

    }
}
