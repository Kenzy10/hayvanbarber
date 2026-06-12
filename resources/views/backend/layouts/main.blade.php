<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvan Backend</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @stack('css')

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo-area">
            <div class="scissor">
                <i class="fa-solid fa-scissors"></i>
            </div>

            <div class="brand">
                <h2>HAYVAN</h2>
                <h4>BARBER.ID</h4>
            </div>
        </div>

        <ul class="menu">

                <li>
            <a href="/dashboard">
                <i class="fa-solid fa-house"></i>
                BERANDA
            </a>
        </li>

        <li>
            <a href="/user">
                <i class="fa-solid fa-user"></i>
                USER
            </a>
        </li>

        <li>
            <a href="/layanan">
                <i class="fa-solid fa-hand-sparkles"></i>
                LAYANAN
            </a>
        </li>

        </ul>

    </aside>

    <!-- CONTENT -->
    <main class="content">

        <div class="topbar">
            <i class="fa-solid fa-circle-user"></i>
        </div>

        @yield('content')

    </main>

</div>

<!-- FOOTER -->
<footer class="footer">

    <div class="foot-item">
        <i class="fa-solid fa-location-dot"></i>
        <div>
            <b>LOKASI</b><br>
            Pabuaran,Kec. Bojong Gede,<br>
            Bogor, Jawa Barat 16921
        </div>
    </div>

    <div class="foot-item">
        <i class="fa-regular fa-clock"></i>
        <div>
            <b>JAM BUKA</b><br>
            10.00 - 21.00 WIB<br>
            BUKA SETIAP HARI
        </div>
    </div>

    <div class="foot-item">
        <i class="fa-solid fa-phone"></i>
        <div>
            <b>HUBUNGI KAMI</b><br>
            08xx-xxxx-xxxx
        </div>
    </div>

    <div class="foot-item">
        <i class="fa-brands fa-instagram"></i>
        <div>
            <b>FOLLOW US</b><br>
            hayvanbarber.id
        </div>
    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')
</body>
</html>