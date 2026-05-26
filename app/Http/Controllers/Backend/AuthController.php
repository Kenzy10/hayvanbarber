<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // tampil login
    public function login()
    {
        return view('backend.auth.login');
    }

    // proses login sementara
    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // login sementara hardcode
        if($email == 'admin@gmail.com' && $password == '12345'){
            return redirect('/dashboard');
        }

        return back()->with('error','Email atau Password salah');
    }
}