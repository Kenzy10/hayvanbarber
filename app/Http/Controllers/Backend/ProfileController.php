<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function index()
    {
        return redirect()->route('profile.edit');
    }

    // Tampilkan Form Edit Profile sesuai UI Baru
    public function edit()
    {
        $user = auth()->user(); 
        return view('backend.profile.edit', compact('user'));
    }

    // Proses Update Data Profile
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:admin,email,' . $user->id, 
            'no_hp'      => 'nullable|string|max:20',
            'password'   => 'nullable|string|min:8',
        ]);

        $user->nama_admin = $request->nama_admin;
        $user->email = $request->email;
        
        if (isset($user->no_hp) || \Schema::hasColumn($user->getTable(), 'no_hp')) {
            $user->no_hp = $request->no_hp;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('layanan.index')->with('success', 'Profil berhasil diperbarui');
    }
}