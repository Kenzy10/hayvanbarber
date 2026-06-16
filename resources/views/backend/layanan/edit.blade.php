@extends('backend.layouts.main')

@section('content')
<div style="padding: 40px; font-family: 'Arial', sans-serif;">
    
    <div style="background-color: white; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); padding: 40px; min-height: 500px;">
        
        <h2 style="font-size: 24px; font-weight: 800; color: black; margin: 0 0 30px 0;">Edit Layanan</h2>

        <form action="/layanan/{{ $layanan->id }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 25px;">
                
                <div>
                    <label style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px; color: black;">Harga (Rupiah)</label>
                    <input type="number" name="harga" value="{{ $layanan->harga }}" style="width: 100%; padding: 12px 15px; border: 1px solid #ccc; border-radius: 12px; font-size: 14px; box-sizing: border-box;" required>
                </div>

                <div>
                    <label style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px; color: black;">Status</label>
                    <select name="status" style="width: 100%; padding: 12px 15px; border: 1px solid #ccc; border-radius: 12px; font-size: 14px; background-color: white; box-sizing: border-box;" required>
                        <option value="Aktif" {{ $layanan->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ $layanan->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

            </div>

            <div style="margin-bottom: 25px;">
                <label style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px; color: black;">Nama Layanan</label>
                <input type="text" name="nama_layanan" value="{{ $layanan->nama_layanan }}" style="width: 100%; padding: 12px 15px; border: 1px solid #ccc; border-radius: 12px; font-size: 14px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 35px;">
                <label style="font-weight: 700; font-size: 14px; display: block; margin-bottom: 8px; color: black;">Durasi</label>
                <input type="text" name="durasi" value="{{ $layanan->durasi }}" style="width: 100%; padding: 12px 15px; border: 1px solid #ccc; border-radius: 12px; font-size: 14px; box-sizing: border-box;" required>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background-color: #10b981; color: white; border: none; padding: 12px 30px; border-radius: 10px; font-weight: bold; font-size: 14px; cursor: pointer;">
                    Simpan
                </button>
                
                <a href="/layanan" style="background-color: #6b7280; color: white; text-decoration: none; padding: 12px 25px; border-radius: 10px; font-weight: bold; font-size: 14px; text-align: center;">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>
@endsection