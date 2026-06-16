<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIKA BACKEND (Untuk Admin Lama kamu)
    |--------------------------------------------------------------------------
    */
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

        return redirect('/backend/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIKA FRONTEND - REGISTER (Untuk Customer Baru)
    |--------------------------------------------------------------------------
    */
    public function register(Request $request)
    {
        // 1. Validasi input form dari frontend
        $request->validate([
            'username'   => 'required|string|max:255|unique:users,name',
            'no_telepon' => 'required|string|max:15',
            'password'   => 'required|string|min:6',
        ]);

        // Bikin email palsu otomatis dari username pembeli
        $emailOtomatis = strtolower(str_replace(' ', '', $request->username)) . '@hayvanbarber.com';

        // 2. Simpan data customer baru ke tabel 'users'
        $user = User::create([
            'name'       => $request->username,
            'email'      => $emailOtomatis,
            'no_telepon' => $request->no_telepon,
            'password'   => Hash::make($request->password),
            'role'       => 'customer',
        ]);

        // 3. Otomatis loginkan usernya
        Auth::login($user);

        // 4. Lempar langsung ke halaman "DAFTAR BERHASIL" berpartikel cyan!
        return redirect()->route('register.success');
    }

    /*
    |--------------------------------------------------------------------------
    | KODE BARU: LOGIKA FRONTEND - LOGIN (Untuk Customer)
    |--------------------------------------------------------------------------
    */
    public function loginCustomer(Request $request)
    {
        // 1. Validasi input form login dari frontend
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Cari user di tabel 'users' berdasarkan kolom 'name'
        $user = User::where('name', $request->username)->first();

        // 3. Cek apakah user ada dan password-nya benar
        if ($user && Hash::check($request->password, $user->password)) {

            // Loginkan user menggunakan Guard standar Laravel
            Auth::login($user);

            // Lempar ke halaman welcome utama pembeli
            return redirect('/beranda');
        }

        // 4. Jika salah, kembalikan ke halaman login dan beri pesan error
        return back()->with('error', 'Username atau Password salah!');
    }
}
