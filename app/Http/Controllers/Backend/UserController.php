<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Admin::paginate(5);


        return view('backend.user.index', compact('users'));
    }

        public function edit($id)
    {
        $user = \App\Models\Admin::findOrFail($id);

        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\Admin::findOrFail($id);

        $user->update([
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return redirect('/user')
            ->with('success', 'User berhasil diubah');
    }

    public function destroy($id)
    {
        $user = Admin::findOrFail($id);

        $user->delete();

        return redirect('/user')
            ->with('success', 'User berhasil dihapus');
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:5',
        ]);

        Admin::create([
            'nama_admin' => $request->nama_admin,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }
}