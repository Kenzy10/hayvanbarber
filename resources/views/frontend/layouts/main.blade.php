<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HAYVAN BARBER.ID')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        :root {
            --primary-cyan: #00E5FF;
            --bg-black: #111111;
            --card-bg: #1c1c1c;
            --text-light-gray: #CCCCCC;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-black);
            color: #FFFFFF;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden; 
        }
        
        
        .main-content {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        
        .info-footer {
            height: 10vh;
            background-color: var(--card-bg);
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            font-size: 0.8rem;
            color: var(--text-light-gray);
            border-top: 1px solid #333;
        }
        .footer-item { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
        }
        .icon-cyan { 
            color: var(--primary-cyan); 
            font-size: 1.2rem; 
        }
        .item-text { 
            display: flex; 
            flex-direction: column; 
        }
        .item-text .label { 
            font-weight: 700; 
            color: #FFFFFF; 
        }
        .item-text .details { 
            line-height: 1.3; 
        }
    </style>
    
    @yield('styles')
</head>
<body>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="info-footer">
        <div class="footer-item">
            <i class="fas fa-map-marker-alt icon-cyan"></i>
            <div class="item-text">
                <span class="label">LOKASI</span>
                <span class="details">Pabuaran, Kec. Bojong Gede,<br> Bogor, Jawa Barat 16921</span>
            </div>
        </div>
        <div class="footer-item">
            <i class="far fa-clock icon-cyan"></i>
            <div class="item-text">
                <span class="label">JAM BUKA</span>
                <span class="details">10.00 - 21.00 WIB<br> BUKA SETIAP HARI</span>
            </div>
        </div>
        <div class="footer-item">
            <i class="fas fa-phone-alt icon-cyan"></i>
            <div class="item-text">
                <span class="label">HUBUNGI KAMI</span>
                <span class="details">0838-1155-9114</span>
            </div>
        </div>
        <div class="footer-item">
            <i class="fab fa-instagram icon-cyan"></i>
            <div class="item-text">
                <span class="label">FOLLOW US</span>
                <span class="details">hayvanbarber.id</span>
            </div>
        </div>
    </footer>

</body>
</html>