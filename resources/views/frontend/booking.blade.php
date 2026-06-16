@extends('frontend.layouts.main')

@section('title', 'Booking Berhasil - HAYVAN BARBER.ID')

@section('styles')
<style>
    /* KONTAINER UTAMA */
    .booking-success-wrapper {
        min-height: 100vh;
        background-color: #0B0F12;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 20px;
    }

    /* EFEK PARTIKEL DIGITAL (SESUAI GAMBAR) */
    .bg-particles {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: radial-gradient(rgba(0, 229, 255, 0.15) 1.5px, transparent 0);
        background-size: 30px 30px;
        z-index: 1;
    }

    .success-content {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 550px;
        text-align: center;
        animation: fadeInUp 0.6s ease;
    }

    /* ICON CHECKMARK GLOWING */
    .check-icon-circle {
        width: 90px;
        height: 90px;
        border: 4px solid #00E5FF;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px auto;
        color: #00E5FF;
        font-size: 3rem;
        box-shadow: 0 0 25px rgba(0, 229, 255, 0.3);
        background-color: rgba(0, 0, 0, 0.5);
    }

    .success-content h1 {
        font-size: 2.5rem;
        font-weight: 800;
        letter-spacing: 2px;
        color: #fff;
        margin-bottom: 10px;
    }

    .success-content p.subtitle {
        color: #A0A0A0;
        margin-bottom: 40px;
        font-size: 1rem;
    }

    /* TABEL STRUK (TABLE STRIPED STYLE) */
    .receipt-box {
        background-color: rgba(20, 25, 28, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 40px;
    }

    .receipt-table {
        width: 100%;
        border-collapse: collapse;
    }

    .receipt-table tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .receipt-table td {
        padding: 16px 25px;
        font-size: 1rem;
    }

    .receipt-table td.label-cell {
        text-align: left;
        color: #888;
        font-weight: 500;
    }

    .receipt-table td.value-cell {
        text-align: right;
        color: #fff;
        font-weight: 600;
    }

    /* TOMBOL AKSI */
    .action-group {
        display: flex;
        gap: 15px;
    }

    .btn-action {
        flex: 1;
        padding: 15px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 800;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-home {
        background-color: #00E5FF;
        color: #000;
    }

    .btn-home:hover { background-color: #00bfff; transform: translateY(-3px); }

    .btn-print {
        background-color: #D32F2F; /* Merah sesuai gambar kamu */
        color: #fff;
    }

    .btn-print:hover { background-color: #b71c1c; transform: translateY(-3px); }

    /* ANIMASI */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* CSS KHUSUS SAAT CETAK (PRINT) */
    @media print {
        .btn-action, .bg-particles {
            display: none !important;
        }
        body, .booking-success-wrapper {
            background-color: #fff !important;
            color: #000 !important;
        }
        .receipt-box {
            border: 1px solid #000;
            background: #fff;
        }
        .receipt-table td { color: #000 !important; }
        .check-icon-circle { border: 2px solid #000; color: #000; box-shadow: none; }
        .success-content h1 { color: #000; }
    }
</style>
@endsection

@section('content')
<div class="booking-success-wrapper">
    <div class="bg-particles"></div>

    <div class="success-content">
        <div class="check-icon-circle">
            <i class="fas fa-check"></i>
        </div>

        <h1>BOOKING BERHASIL</h1>
        <p class="subtitle">Terima kasih, booking Anda telah kami terima</p>

        <div class="receipt-box">
            <table class="receipt-table">
                <tr>
                    <td class="label-cell">Nama</td>
                    <td class="value-cell">{{ $booking['nama'] ?? 'Guest' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Layanan</td>
                    <td class="value-cell">{{ $booking['layanan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Tempat</td>
                    <td class="value-cell">{{ $booking['tempat'] ?? 'On The Spot' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Tanggal</td>
                    <td class="value-cell">{{ isset($booking['tanggal']) ? \Carbon\Carbon::parse($booking['tanggal'])->translatedFormat('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Waktu</td>
                    <td class="value-cell">{{ $booking['waktu'] ?? '-' }} WIB</td>
                </tr>
                <tr>
                    <td class="label-cell">Total Harga</td>
                    <td class="value-cell" style="color: #00E5FF; font-size: 1.2rem;">
                        @php
                            $harga = ['Curly Pom' => 'Rp 35.000', 'Hair Cut' => 'Rp 30.000', 'Hair Coloring' => 'Rp 50.000'];
                            echo $harga[$booking['layanan']] ?? 'Rp 0';
                        @endphp
                    </td>
                </tr>
            </table>
        </div>

        <div class="action-group">
            <a href="/beranda" class="btn-action btn-home">
                <i class="fas fa-home"></i> Kembali Ke Beranda
            </a>
            <button onclick="window.print()" class="btn-action btn-print">
                <i class="fas fa-print"></i> Cetak Bukti Booking
            </button>
        </div>
    </div>
</div>
@endsection