@extends('backend.layouts.main')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
@endpush

@section('content')

<div class="user-page">

    <div class="user-card">

        <h2>Tambah User</h2>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="row-select">

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="role" class="custom-select">
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="custom-select">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_admin" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-save">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection