@extends('frontend.layouts.main')

@section('title', 'HAYVAN BARBER.ID')

@section('styles')
<style>
    /* Kontainer Utama: Full Hitam & Semua di Tengah */
    .hero-center-container {
        flex: 1;
        background-color: var(--bg-black);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
        position: relative;
    }

    .text-content { 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        gap: 20px; 
        z-index: 2; /* Biar selalu di atas background */
    }
    
    /* Logo Styling */
    .logo-area h1 { 
        font-size: 4.5rem; 
        font-weight: 700; 
        letter-spacing: 4px; 
    }
    .sub-logo { 
        display: block; 
        font-size: 1.8rem; 
        color: var(--text-light-gray); 
        margin-top: -5px; 
        letter-spacing: 2px;
    }

    /* Tagline Styling */
    .tagline-area { 
        margin-top: 10px;
        margin-bottom: 30px; 
        font-size: 2rem; 
        font-weight: 600; 
        letter-spacing: 1px;
    }
    .tagline-cyan { 
        color: var(--primary-cyan); 
    }
    
    /* Tombol Navigasi */
    .button-group { 
        display: flex; 
        flex-direction: column; 
        gap: 15px; 
        width: 100%; 
        min-width: 340px; 
    }
    .btn {
        padding: 16px; 
        border-radius: 8px; 
        font-size: 1.2rem; 
        font-weight: 700;
        cursor: pointer; 
        border: none; 
        transition: all 0.2s ease;
        background-color: var(--primary-cyan); 
        color: #FFFFFF; 
        text-decoration: none;
        text-align: center;
        letter-spacing: 1px;
    }
    .btn:hover { 
        background-color: #00bfff; 
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 229, 255, 0.3); /* Efek glow cyan tipis */
    }
    .btn:active {
        transform: translateY(0);
    }
</style>
@endsection

@section('content')
    <div class="hero-center-container">
        <div class="text-content">
            <div class="logo-area">
                <h1>HAYVAN</h1>
                <span class="sub-logo">BARBER.ID</span>
            </div>
            
            <div class="tagline-area">
                <p>CLASSIC CUTS</p>
                <p class="tagline-cyan">MODERN STYLE</p>
            </div>

            <div class="button-group">
                <a href="/login" class="btn">MASUK</a>
                <a href="/register" class="btn">DAFTAR</a>
            </div>
        </div>
    </div>
@endsection