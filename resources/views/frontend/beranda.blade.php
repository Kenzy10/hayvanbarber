@extends('frontend.layouts.main')

@section('title', 'Beranda - HAYVAN BARBER.ID')

@section('styles')
<style>
    /* Styling dasar halaman Beranda */
    .beranda-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        background-color: var(--bg-black);
        overflow-y: auto;
    }

    /* Navbar Atas */
    .frontend-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 50px;
        background-color: #000000;
        border-bottom: 1px solid #222;
    }
    .nav-logo { display: flex; align-items: center; gap: 10px; }
    .nav-logo i { color: var(--primary-cyan); font-size: 1.5rem; }
    .nav-logo h3 { font-weight: 700; letter-spacing: 1px; }
    
    .nav-menu { display: flex; gap: 30px; list-style: none; }
    .nav-menu a { color: #fff; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: color 0.2s; }
    .nav-menu a:hover { color: var(--primary-cyan); }

    /* Main Content Grid */
    .beranda-content {
        display: flex;
        flex: 1;
        padding: 40px 50px;
        gap: 40px;
    }

    .left-section {
        flex: 2;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    /* Hero Banner Horizontal */
    .hero-banner {
        background: #050b0d;
        padding: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        border: 1px solid #222;
    }
    .hero-title-area { flex: 1; }
    .hero-banner h1 { font-size: 2.3rem; font-weight: 800; line-height: 1.2; margin: 0; }
    .hero-banner .cyan-text { color: var(--primary-cyan); }

    .hero-divider {
        width: 1px;
        background-color: rgba(255, 255, 255, 0.15);
        align-self: stretch;
        margin: 0 10px;
    }

    .hero-features-area {
        flex: 1.2;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .feature-item { display: flex; align-items: center; gap: 15px; }
    
    .feature-icon-box {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .feature-icon-box.solid { background-color: var(--primary-cyan); color: #000; }
    .feature-icon-box.outline { border: 2px solid var(--primary-cyan); color: var(--primary-cyan); }

    .feature-text h4 { font-size: 1rem; font-weight: 700; margin: 0 0 3px 0; text-transform: uppercase; }
    .feature-text p { font-size: 0.85rem; color: var(--text-light-gray); margin: 0; }

    /* Grid Layanan */
    .section-title { font-size: 1.2rem; font-weight: 700; margin-bottom: 20px; border-left: 4px solid var(--primary-cyan); padding-left: 10px; }
    .layanan-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; }
    .layanan-card {
        background-color: var(--card-bg);
        border: 1px solid #333;
        border-radius: 12px;
        padding: 25px 20px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.2s, border-color 0.2s;
    }
    .layanan-card:hover { transform: translateY(-5px); border-color: var(--primary-cyan); }
    .layanan-card i { font-size: 2rem; color: var(--primary-cyan); margin-bottom: 15px; }
    .layanan-card h4 { font-size: 1.1rem; margin-bottom: 5px; }
    .layanan-card p { color: var(--text-light-gray); font-size: 0.9rem; }

    /* Sisi Kanan: Form Booking */
    .right-section {
        flex: 1;
        background-color: #14191C;
        border-radius: 12px;
        padding: 30px;
        border: 1px solid rgba(0, 229, 255, 0.15);
        height: fit-content;
    }
    .booking-form-group { margin-bottom: 15px; }
    .booking-form-group label { display: block; font-size: 0.85rem; color: var(--text-light-gray); margin-bottom: 5px; font-weight: 600; }
    
    .booking-input {
        width: 100%; 
        padding: 12px; 
        background-color: #1A2226; 
        border: 1px solid rgba(255, 255, 255, 0.1); 
        border-radius: 6px; 
        color: #fff; 
        outline: none;
        font-size: 0.95rem;
    }
    .booking-input:focus { border-color: var(--primary-cyan); }

    .btn-booking-submit {
        width: 100%;
        padding: 14px 0;
        background-color: #00E5FF;
        color: #000;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        cursor: pointer;
        margin-top: 15px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    /* ==========================================================================
       STYLE UNTUK KEDUA MODAL (OVERLAY DASAR)
       ========================================================================== */
    .custom-modal-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    .custom-modal-overlay.show {
        opacity: 1;
        pointer-events: auto;
    }
    .custom-modal-content {
        background-color: #14191c;
        width: 100%;
        max-width: 520px;
        padding: 35px;
        border-radius: 16px;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }
    .custom-modal-overlay.show .custom-modal-content {
        transform: scale(1);
    }

    /* ==========================================================================
       MODAL 1: KONFIRMASI DATA
       ========================================================================== */
    .confirm-header-icon {
        width: 65px; height: 65px;
        background-color: #00e5ff;
        color: #000;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; margin: 0 auto 20px auto;
    }
    .custom-modal-content h3.modal-title-center {
        text-align: center; font-size: 1.6rem; font-weight: 800; margin-bottom: 5px; color: #fff;
    }
    .custom-modal-content p.modal-sub-center {
        text-align: center; color: #888; font-size: 0.85rem; margin-bottom: 25px;
    }
    
    /* Tabel List Struk Gelap */
    .receipt-table {
        width: 100%; border-collapse: collapse; margin-bottom: 30px;
    }
    .receipt-table tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    .receipt-table td {
        padding: 12px 10px; font-size: 0.95rem; vertical-align: middle;
    }
    .receipt-table td i {
        color: #00e5ff; width: 25px; font-size: 1.1rem;
    }
    .receipt-table td.label-txt {
        color: #aaa; font-weight: 500;
    }
    .receipt-table td.value-txt {
        color: #fff; font-weight: 600; text-align: right;
    }

    /* Group Dua Tombol: Batal & Konfirmasi */
    .modal-btn-group {
        display: flex; gap: 15px;
    }
    .btn-modal-action {
        flex: 1; padding: 12px 0; border-radius: 8px; font-size: 0.95rem; font-weight: 700; cursor: pointer; text-transform: uppercase; border: none; transition: background-color 0.2s;
    }
    .btn-modal-action.btn-secondary {
        background-color: #252e33; color: #fff; border: 1px solid rgba(255,255,255,0.1);
    }
    .btn-modal-action.btn-secondary:hover { background-color: #313d44; }
    .btn-modal-action.btn-primary {
        background-color: #4fc3f7; color: #000;
    }
    .btn-modal-action.btn-primary:hover { background-color: #29b6f6; }

    /* ==========================================================================
       MODAL 2: BOOKING BERHASIL (DUA TOMBOL SEJAJAR HORIZONTAL)
       ========================================================================== */
    .success-icon-circle {
        width: 80px; height: 80px;
        border: 3px solid #00E5FF; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 25px auto; color: #00E5FF; font-size: 2.5rem;
    }
    .success-particle-bg {
        background-image: radial-gradient(rgba(0, 229, 255, 0.15) 1px, transparent 0);
        background-size: 16px 16px;
    }

    /* Styling Group Dua Tombol Sejajar */
    .modal-btn-group-row {
        display: flex;
        gap: 12px;
        width: 100%;
        margin-top: 20px;
    }
    .btn-modal-row {
        flex: 1;
        padding: 14px 0;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 800;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: background-color 0.2s, transform 0.1s;
    }
    .btn-modal-row:active {
        transform: scale(0.98);
    }
    .btn-cyan-bg {
        background-color: #00E5FF;
        color: #000;
    }
    .btn-cyan-bg:hover {
        background-color: #00bfff;
    }
    .btn-red-bg {
        background-color: #E53935;
        color: #fff;
    }
    .btn-red-bg:hover {
        background-color: #c62828;
    }

    /* ==========================================================================
       LOGIKA AREA CETAK (PRINT) - SINKRONISASI PRINTER OTOMATIS
       ========================================================================== */
    @media print {
        body * {
            visibility: hidden;
        }
        #successModal, #successModal * {
            visibility: visible;
        }
        #successModal {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            background: #fff !important;
            display: flex !important;
            justify-content: center;
            align-items: flex-start;
        }
        .custom-modal-content {
            background: #fff !important;
            color: #000 !important;
            border: 1px solid #000 !important;
            box-shadow: none !important;
            margin-top: 40px;
        }
        .receipt-table tr {
            border-bottom: 1px solid #ccc !important;
        }
        .label-txt, .value-txt {
            color: #000 !important;
        }
        .modal-btn-group-row, .success-icon-circle {
            display: none !important;
        }
    }
</style>
@endsection

@section('content')
<div class="beranda-container">
    
    <nav class="frontend-navbar">
        <div class="nav-logo">
            <i class="fas fa-scissors"></i>
            <h3>HAYVAN BARBER.ID</h3>
        </div>
        <ul class="nav-menu">
            <li><a href="/beranda">BERANDA</a></li>
            <li><a href="/tentang-kami">TENTANG KAMI</a></li>
            <li><a href="/setting">SETTING</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #ff4d4d;">LOGOUT</a>
            </li>
        </ul>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">@csrf</form>
    </nav>

    <div class="beranda-content">
        <div class="left-section">
            <div class="hero-banner">
                <div class="hero-title-area">
                    <h1>CLASSIC CUTS</h1>
                    <h1 class="cyan-text">MODERN STYLE</h1>
                </div>
                <div class="hero-divider"></div>
                <div class="hero-features-area">
                    <div class="feature-item">
                        <div class="feature-icon-box solid"><i class="fas fa-star"></i></div>
                        <div class="feature-text">
                            <h4>Profesional Barber</h4>
                            <p>Berpengalaman dan terpercaya</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon-box outline"><i class="far fa-star"></i></div>
                        <div class="feature-text">
                            <h4>Best Service</h4>
                            <p>Kenyamanan pelanggan adalah prioritas kami</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="section-title">PILIH LAYANAN</div>
                <div class="layanan-grid">
                    <div class="layanan-card" onclick="selectLayananDirectly('Curly Pom')">
                        <i class="fas fa-cut"></i>
                        <h4>Curly Pom</h4>
                        <p>Rp 35.000</p>
                    </div>
                    <div class="layanan-card" onclick="selectLayananDirectly('Hair Cut')">
                        <i class="fas fa-cut"></i>
                        <h4>Hair Cut</h4>
                        <p>Rp 30.000</p>
                    </div>
                    <div class="layanan-card" onclick="selectLayananDirectly('Hair Coloring')">
                        <i class="fas fa-spray-can"></i>
                        <h4>Hair Coloring</h4>
                        <p>Rp 50.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="section-title">BOOKING</div>
            <form id="formBooking" action="/booking" method="POST" onsubmit="openConfirmationModal(event)">
                @csrf
                <div class="booking-form-group">
                    <label>Masukkan Nama Anda</label>
                    <input type="text" id="inputNama" class="booking-input" placeholder="Nama Lengkap" required>
                </div>
                <div class="booking-form-group">
                    <label>Pilih Layanan</label>
                    <select id="inputLayanan" class="booking-input">
                        <option value="Curly Pom" data-harga="Rp 35.000">Curly Pom</option>
                        <option value="Hair Cut" data-harga="Rp 30.000">Hair Cut</option>
                        <option value="Hair Coloring" data-harga="Rp 50.000">Hair Coloring</option>
                    </select>
                </div>
                <div class="booking-form-group">
                    <label>Pilih Tempat</label>
                    <select id="inputTempat" class="booking-input">
                        <option value="On The Spot">On The Spot</option>
                        <option value="Home Service">Home Service</option>
                    </select>
                </div>
                <div class="booking-form-group">
                    <label>Pilih Tanggal</label>
                    <input type="date" id="inputTanggal" class="booking-input" required>
                </div>
                <div class="booking-form-group">
                    <label>Pilih Waktu</label>
                    <input type="time" id="inputWaktu" class="booking-input" required>
                </div>
                <div class="booking-form-group">
                    <label>Pilih Barber</label>
                    <select id="inputBarber" class="booking-input">
                        <option value="Ivan">Ivan</option>
                        <option value="Rian">Rian</option>
                        <option value="Fahmi">Fahmi</option>
                    </select>
                </div>
                
                <button type="submit" class="btn-booking-submit">
                    <i class="fas fa-calendar-check"></i> KONFIRMASI BOOKING
                </button>
            </form>
        </div>
    </div>
</div>

<div id="confirmModal" class="custom-modal-overlay">
    <div class="custom-modal-content">
        <div class="confirm-header-icon">
            <i class="far fa-calendar-alt"></i>
        </div>
        <h3 class="modal-title-center">KONFIRMASI BOOKING</h3>
        <p class="modal-sub-center">Konfirmasi dan check kembali pesanan anda</p>

        <table class="receipt-table">
            <tr>
                <td><i class="fas fa-user"></i> <span class="label-txt">Nama</span></td>
                <td id="confNama" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="fas fa-cut"></i> <span class="label-txt">Layanan</span></td>
                <td id="confLayanan" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="fas fa-home"></i> <span class="label-txt">Tempat</span></td>
                <td id="confTempat" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="far fa-calendar-check"></i> <span class="label-txt">Tanggal</span></td>
                <td id="confTanggal" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="far fa-clock"></i> <span class="label-txt">Waktu</span></td>
                <td id="confWaktu" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="fas fa-dollar-sign"></i> <span class="label-txt">Harga</span></td>
                <td id="confHarga" class="value-txt">-</td>
            </tr>
            <tr>
                <td><i class="fas fa-user-friends"></i> <span class="label-txt">Barber</span></td>
                <td id="confBarber" class="value-txt">-</td>
            </tr>
        </table>

        <div class="modal-btn-group">
            <button type="button" class="btn-modal-action btn-secondary" onclick="closeConfirmationModal()">BATAL</button>
            <button type="button" class="btn-modal-action btn-primary" onclick="triggerSuccessModal()">KONFIRMASI</button>
        </div>
    </div>
</div>

<div id="successModal" class="custom-modal-overlay">
    <div class="custom-modal-content success-particle-bg">
        <div class="success-icon-circle">
            <i class="fas fa-check"></i>
        </div>
        <h3 class="modal-title-center">BOOKING BERHASIL</h3>
        <p class="modal-sub-center">Terima kasih, booking Anda telah kami terima</p>

        <table class="receipt-table">
            <tr>
                <td class="label-txt">Nama</td>
                <td id="successNama" class="value-txt">-</td>
            </tr>
            <tr>
                <td class="label-txt">Layanan</td>
                <td id="successLayanan" class="value-txt">-</td>
            </tr>
            <tr>
                <td class="label-txt">Tempat</td>
                <td id="successTempat" class="value-txt">-</td>
            </tr>
            <tr>
                <td class="label-txt">Tanggal</td>
                <td id="successTanggal" class="value-txt">-</td>
            </tr>
            <tr>
                <td class="label-txt">Waktu</td>
                <td id="successWaktu" class="value-txt">-</td>
            </tr>
            <tr>
                <td class="label-txt">Total Harga</td>
                <td id="successHarga" class="value-txt" style="color: #00E5FF;">-</td>
            </tr>
        </table>

        <div class="modal-btn-group-row">
            <button type="button" class="btn-modal-row btn-cyan-bg" onclick="finalPageReset()">
                <i class="fas fa-home"></i> BERANDA
            </button>
            <button type="button" class="btn-modal-row btn-red-bg" onclick="window.print()">
                <i class="fas fa-print"></i> CETAK BUKTI
            </button>
        </div>
    </div>
</div>

<script>
    // Format tanggal standard (YYYY-MM-DD) -> 20 Maret 2026
    function formatTanggalIndo(dateString) {
        if(!dateString) return '-';
        const opsi = { day: 'numeric', month: 'long', year: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', opsi);
    }

    // Step 1: Saat Form diisi dan klik "Konfirmasi Booking" -> Muncul Pop-up Konfirmasi Data
    function openConfirmationModal(event) {
        event.preventDefault(); // Mencegah page refresh otomatis

        // Tarik data form
        const nama = document.getElementById('inputNama').value;
        const selectLayanan = document.getElementById('inputLayanan');
        const layanan = selectLayanan.value;
        const harga = selectLayanan.options[selectLayanan.selectedIndex].getAttribute('data-harga');
        const tempat = document.getElementById('inputTempat').value;
        const tanggal = document.getElementById('inputTanggal').value;
        const waktu = document.getElementById('inputWaktu').value;
        const barber = document.getElementById('inputBarber').value;

        // Pasang data ke tabel Modal Konfirmasi
        document.getElementById('confNama').innerText = nama;
        document.getElementById('confLayanan').innerText = layanan;
        document.getElementById('confTempat').innerText = tempat;
        document.getElementById('confTanggal').innerText = formatTanggalIndo(tanggal);
        document.getElementById('confWaktu').innerText = waktu;
        document.getElementById('confHarga').innerText = harga;
        document.getElementById('confBarber').innerText = barber;

        // Tampilkan modal konfirmasi
        document.getElementById('confirmModal').classList.add('show');
    }

    // Fungsi jika klik tombol "BATAL" di modal pertama
    function closeConfirmationModal() {
        document.getElementById('confirmModal').classList.remove('show');
    }

    // Step 2: Jika klik tombol "KONFIRMASI" di modal pertama -> Pindah ke Modal Sukses
    function triggerSuccessModal() {
        // Ambil data yang sudah ada di modal konfirmasi, salin ke modal sukses
        document.getElementById('successNama').innerText = document.getElementById('confNama').innerText;
        document.getElementById('successLayanan').innerText = document.getElementById('confLayanan').innerText;
        document.getElementById('successTempat').innerText = document.getElementById('confTempat').innerText;
        document.getElementById('successTanggal').innerText = document.getElementById('confTanggal').innerText;
        document.getElementById('successWaktu').innerText = document.getElementById('confWaktu').innerText;
        document.getElementById('successHarga').innerText = document.getElementById('confHarga').innerText;

        // Sembunyikan modal konfirmasi, lalu tampilkan modal sukses
        document.getElementById('confirmModal').classList.remove('show');
        
        // Kasih delay mikro agar transisinya halus bergantian
        setTimeout(() => {
            document.getElementById('successModal').classList.add('show');
        }, 200);
    }

    // Step 3: Klik "BERANDA" di modal sukses -> Reset & Selesai
    function finalPageReset() {
        document.getElementById('successModal').classList.remove('show');
        document.getElementById('formBooking').reset();
    }

    // Helper: Sinkronisasi klik card kiri ke form drop-down kanan
    function selectLayananDirectly(namaLayanan) {
        document.getElementById('inputLayanan').value = namaLayanan;
    }
</script>
@endsection