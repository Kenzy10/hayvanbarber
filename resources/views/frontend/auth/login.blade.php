@extends('frontend.layouts.main')

@section('title', 'Login - HAYVAN BARBER.ID')

@section('styles')
<style>
    /* Full Background Image khusus untuk Auth Page */
    .auth-bg-container {
        flex: 1;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url('{{ asset("images/barber-bg.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    /* Card Box Tengah */
    .auth-card {
        background-color: rgba(36, 36, 36, 0.95);
        /* Abu-abu sangat gelap sesuai mockup */
        width: 100%;
        max-width: 420px;
        border-radius: 16px;
        padding: 40px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    /* Logo Area di dalam Card */
    .card-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
    }

    .card-logo i {
        color: var(--primary-cyan);
        font-size: 2rem;
    }

    .card-logo h2 {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .card-logo span {
        display: block;
        font-size: 0.9rem;
        color: var(--text-light-gray);
        letter-spacing: 1px;
        margin-top: -5px;
    }

    /* Form Styling */
    .form-group {
        position: relative;
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        font-size: 1.1rem;
    }

    .form-input {
        width: 100%;
        padding: 16px 16px 16px 45px;
        background-color: #1a1a1a;
        border: 1px solid #333;
        border-radius: 8px;
        color: #fff;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: var(--primary-cyan);
    }

    /* Tombol Masuk */
    .btn-submit {
        width: 100%;
        padding: 16px;
        background-color: var(--primary-cyan);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        letter-spacing: 1px;
        margin-top: 10px;
        transition: all 0.2s;
    }

    .btn-submit:hover {
        background-color: #00bfff;
        box-shadow: 0 4px 15px rgba(0, 229, 255, 0.3);
    }

    /* Link Bawah */
    .switch-auth-link {
        margin-top: 25px;
        font-size: 0.9rem;
        color: var(--text-light-gray);
    }

    .switch-auth-link a {
        color: var(--primary-cyan);
        text-decoration: none;
        font-weight: 600;
    }

    .switch-auth-link a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="auth-bg-container">
    <div class="auth-card">

        <div class="card-logo">
            <i class="fas fa-scissors"></i>
            <div>
                <h2>HAYVAN</h2>
                <span>BARBER.ID</span>
            </div>
        </div>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" class="form-input" placeholder="Username" required autocomplete="off">
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-input" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-submit">MASUK</button>
        </form>

        <div class="switch-auth-link">
            Belum punya akun? <a href="/register">DAFTAR SEKARANG!</a>
        </div>

    </div>
</div>
@endsection