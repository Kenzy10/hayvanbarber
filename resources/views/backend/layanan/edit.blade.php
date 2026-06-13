@extends('backend.layouts.main')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; padding: 40px; background-color: #cbd5e1; min-height: 100vh;">
    <div style="background: white; padding: 40px; border-radius: 30px; width: 100%; max-width: 600px; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
        
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 25px; color: black;">Ubah Layanan</h2>

        <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; font-size: 14px; display: block; margin-bottom: 8px;">Nama Layanan</label>
                <input type="text" name="nama_layanan" value="{{ $layanan->nama_layanan }}" required style="width: 100%; padding: 12px; border: 1.5px solid black; border-radius: 8px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; font-size: 14px; display: block; margin-bottom: 8px;">Harga (Rupiah)</label>
                <input type="number" name="harga" value="{{ $layanan->harga }}" required style="width: 100%; padding: 12px; border: 1.5px solid black; border-radius: 8px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; font-size: 14px; display: block; margin-bottom: 8px;">Durasi</label>
                <input type="text" name="durasi" value="{{ $layanan->durasi }}" required style="width: 100%; padding: 12px; border: 1.5px solid black; border-radius: 8px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="font-weight: bold; font-size: 14px; display: block; margin-bottom: 8px;">Status</label>
                <select name="status" style="width: 100%; padding: 12px; border: 1.5px solid black; border-radius: 8px; box-sizing: border-box; background: white;">
                    <option value="Aktif" {{ $layanan->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ $layanan->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background-color: #a3a3a3; color: black; border: none; padding: 10px 25px; border-radius: 6px; font-weight: bold; cursor: pointer;">Perbaharui</button>
                <a href="{{ route('layanan.index') }}" style="background-color: #a3a3a3; color: black; text-decoration: none; padding: 10px 25px; border-radius: 6px; font-weight: bold; display: inline-block;">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection