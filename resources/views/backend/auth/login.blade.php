<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Hayvan Barber</title>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="card">

    <div class="line"></div>

    <div class="logo">
        <i class="fa-solid fa-scissors"></i>
    </div>

    <div class="brand">
        <h1>HAYVAN</h1>
        <h3>BARBER.ID</h3>
    </div>

    <form method="POST" action="/login">
    @csrf

    @if(session('error'))
        <div class="error-msg">
            {{ session('error') }}
        </div>
    @endif

    <div class="input-box">
        <input type="email" name="email" placeholder="Masukkan Email">
    </div>

    <div class="input-box">
        <input type="password" name="password" placeholder="Masukkan Password">
    </div>

    <button class="btn">
        MASUK
    </button>
</form>

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

</body>
</html>