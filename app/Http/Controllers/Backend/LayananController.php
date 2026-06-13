<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Layanan; 
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::paginate(5);
        return view('backend.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('backend.layanan.create');
    }

    // 3. Simpan Data Baru (Create)
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga'        => 'required|numeric',
            'durasi'       => 'required',
        ]);

        Layanan::create([
            'layanan' => $request->nama_layanan, 
            'harga'   => $request->harga,
            'durasi'  => $request->durasi,
            'status'  => $request->status ?? 'Aktif',
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('backend.layanan.edit', compact('layanan'));
    }

    // 5. Update Data
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required',
            'harga'        => 'required|numeric',
            'durasi'       => 'required',
        ]);

        $layanan->update([
            'layanan' => $request->nama_layanan, 
            'harga'   => $request->harga,
            'durasi'  => $request->durasi,
            'status'  => $request->status,
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil diubah');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()
        ->route('layanan.index')
        ->with('success', 'Layanan berhasil dihapus');
    }
}