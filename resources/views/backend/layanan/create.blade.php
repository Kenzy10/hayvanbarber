@extends('backend.layouts.main')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
@endpush

@section('content')
<div class="user-page">
    <div class="user-card">
        <h2>Tambah Layanan</h2>

        <form action="{{ route('layanan.store') }}" method="POST">
            @csrf

            <div class="row-select">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="custom-select">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Durasi (ex: 30 Menit)</label>
                    <input type="text" name="durasi" required style="width: 100%; box-sizing: border-box;">
                </div>
            </div>

            <div class="form-group">
                <label>Nama Layanan</label>
                <input type="text" name="nama_layanan" required style="width: 100%; box-sizing: border-box;">
            </div>

            <div class="form-group">
                <label>Harga (Rupiah)</label>
                <input type="number" name="harga" required style="width: 100%; box-sizing: border-box;">
            </div>

            <button type="submit" class="btn-save">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection