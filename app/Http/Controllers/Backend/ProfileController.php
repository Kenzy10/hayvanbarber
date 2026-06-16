<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class ProfileController extends Controller
{
    private function currentAdmin()
    {
        return Admin::findOrFail(session('admin_id'));

        if (!$admin) {
            abort(redirect()->route('login')->with('error', 'Silakan login dulu'));
        }

        return $admin;
        }

    public function index()
    {
        return redirect()->route('profile.edit');
    }

    public function edit()
    {
        $user = $this->currentAdmin();
        return view('backend.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->currentAdmin();

       $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:admin,email,' . $user->id,
            'no_hp'      => 'nullable|string|max:20',
            'password'   => 'nullable|string|min:8',
        ], [
            // pesan custom (bahasa Indonesia)
            'nama_admin.required' => 'Nama wajib diisi.',
            'nama_admin.max'      => 'Nama maksimal 255 karakter.',
            'email.required'      => 'Email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email ini sudah dipakai admin lain.',
            'no_hp.max'           => 'No HP maksimal 20 karakter.',
            'password.min'        => 'Password minimal 8 karakter.',
        ]);

        $user->nama_admin = $request->nama_admin;
        $user->email      = $request->email;

        if (Schema::hasColumn($user->getTable(), 'no_hp')) {
            $user->no_hp = $request->no_hp;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Sinkronin nama di session biar navbar ikut update
        session(['admin_name' => $user->nama_admin]);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui');
    }
}