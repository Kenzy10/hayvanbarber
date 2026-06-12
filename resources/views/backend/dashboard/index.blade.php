@extends('backend.layouts.main')

@section('content')

<h1>HAI {{ strtoupper($nama) }}!</h1>

<p>Selamat datang, {{ $nama }}</p>
<p>Kamu memiliki hak akses Super Admin</p>

@endsection