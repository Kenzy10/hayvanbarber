<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berhasil - HAYVAN BARBER.ID</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
        }

        body {
            background-color: #0B0F12; /* Gelap pekat premium */
            color: #FFFFFF;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* GANTI PARTIKEL: Efek Cahaya Glowing Cyan di Background */
        .glow-background {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 229, 255, 0.15) 0%, transparent 70%);
            z-index: 1;
            pointer-events: none;
        }

        /* Konten Utama Tengah */
        .success-box {
            text-align: center;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.02); /* Box transparan super tipis */
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Lingkaran Centang Cyan */
        .icon-circle {
            width: 100px;
            height: 100px;
            border: 3px solid #00E5FF;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 25px rgba(0, 229, 255, 0.4);
            background-color: rgba(0, 0, 0, 0.6);
        }

        .icon-circle i {
            color: #00E5FF;
            font-size: 3rem;
        }

        /* Teks Berhasil */
        .success-text h1 {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 8px;
            color: #FFFFFF;
        }

        .success-text p {
            color: #A0A0A0;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        /* Tombol Kembali Berwarna Cyan */
        .btn-kembali {
            margin-top: 10px;
            padding: 14px 0;
            width: 300px;
            background-color: #00E5FF;
            color: #000000; /* Teks hitam agar kontras dan terbaca jelas */
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            letter-spacing: 1px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 229, 255, 0.3);
            cursor: pointer;
        }

        .btn-kembali:hover {
            background-color: #00bfff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 229, 255, 0.5);
        }
    </style>
</head>
<body>

    <div class="glow-background"></div>

    <div class="success-box">
        <div class="icon-circle">
            <i class="fas fa-check"></i>
        </div>

        <div class="success-text">
            <h1>DAFTAR BERHASIL</h1>
            <p>Terima kasih, data anda telah kami terima</p>
        </div>

        <a href="/welcome" class="btn-kembali">
            <i class="fas fa-home"></i> KEMBALI
        </a>
    </div>

</body>
</html>