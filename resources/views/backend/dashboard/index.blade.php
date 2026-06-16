@extends('backend.layouts.main')

@section('content')
<style>
    /* Styling khusus konten dashboard sesuai figma image_3a857b.png */
    .dashboard-wrapper {
        padding: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .dashboard-title {
        font-size: 64px;
        font-weight: 900;
        color: #000000;
        letter-spacing: 2px;
        margin-bottom: 40px;
        text-transform: uppercase;
        font-family: 'Arial Black', sans-serif;
    }

    /* Kotak putih melengkung utama */
    .welcome-card {
        background-color: #ffffff;
        border-radius: 60px; 
        width: 100%;
        max-width: 850px;
        padding: 40px 50px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        text-align: left;
    }

    .welcome-card h3 {
        font-size: 24px;
        font-weight: bold;
        color: #000000;
        margin-bottom: 12px;
    }

    .welcome-card p {
        font-size: 18px;
        font-weight: 500;
        color: #000000;
        margin: 0;
    }
</style>

<div class="dashboard-wrapper">
    <h1 class="dashboard-title">HAI {{ strtoupper($nama) }}!</h1>

    <div class="welcome-card">
        <h3>Selamat datang, {{ $nama }}</h3>
        <p>Kamu memiliki hak akses Super Admin</p>
    </div>
</div>
@endsection