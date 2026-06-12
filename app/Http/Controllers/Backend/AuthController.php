<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function authenticate(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Password salah');
        }

        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->nama_admin,
        ]);

        return redirect('/dashboard');
    }
}