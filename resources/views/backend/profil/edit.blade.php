@extends('backend.layouts.main')

@section('content')
<div style="padding: 40px; font-family: 'Arial', sans-serif;">
    <div style="background-color: white; border: 1px solid #ccc; padding: 40px; min-height: 500px;">
        
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: flex; gap: 40px; align-items: flex-start;">
                
                <div style="width: 320px; height: 420px; border: 1.5px solid #a6a6a6; background-color: #fff; display: flex; align-items: center; justify-content: center;">
                    <div style="width: 120px; height: 120px; background-color: #000; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 48px; font-weight: bold;">
                        {{ strtoupper(substr($user->nama_admin ?? $user->name ?? 'A', 0, 1)) }}
                    </div>
                </div>

                <div style="flex: 1; max-width: 650px;">
                    
                    <h2 style="font-size: 20px; font-weight: bold; color: black; margin: 0 0 25px 0;">Ubah Profile</h2>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Hak Akses :</label>
                        <input type="text" value="{{ $user->role ?? 'Admin' }}" style="width: 100%; padding: 10px; border: 1.5px solid black; background-color: #fff; font-size: 14px;" readonly>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Status :</label>
                        <input type="text" value="{{ $user->status ?? 'Aktif' }}" style="width: 100%; padding: 10px; border: 1.5px solid black; background-color: #fff; font-size: 14px;" readonly>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Nama :</label>
                        <input type="text" name="nama_admin" value="{{ old('nama_admin', $user->nama_admin ?? $user->name) }}" style="width: 100%; padding: 10px; border: 1.5px solid black; font-size: 14px;" required>
                        @error('nama_admin') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Email :</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" style="width: 100%; padding: 10px; border: 1.5px solid black; font-size: 14px;" required>
                        @error('email') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">No hp :</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp ?? '') }}" style="width: 100%; padding: 10px; border: 1.5px solid black; font-size: 14px;">
                        @error('no_hp') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>

                    <div style="margin-bottom: 35px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Password Baru (Kosongkan jika tidak diganti) :</label>
                        <input type="password" name="password" style="width: 100%; padding: 10px; border: 1.5px solid black; font-size: 14px;">
                    </div>

                    <div style="display: flex; gap: 15px;">
                        <button type="submit" style="background-color: #00ff1a; color: black; border: none; padding: 12px 50px; font-weight: bold; font-size: 16px; cursor: pointer;">
                            Simpan
                        </button>
                        <a href="{{ route('layanan.index') }}" style="background-color: #a6a6a6; color: black; text-decoration: none; padding: 12px 50px; font-weight: bold; font-size: 16px; display: inline-block; text-align: center;">
                            Batal
                        </a>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
@endsection