@extends('backend.layouts.main')

@section('content')
<div style="padding: 40px; font-family: 'Arial', sans-serif;">
    <div style="background-color: white; border-radius: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); padding: 40px; min-height: 500px;">
        
        <h2 style="font-size: 26px; font-weight: 800; color: black; margin: 0 0 30px 0;">Profil Saya</h2>

        <div style="max-width: 500px; border: 1.5px solid #000; padding: 30px; border-radius: 20px;">
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="width: 100px; height: 100px; background-color: #000; color: #fff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 40px; font-weight: bold;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-weight: bold; display: block; margin-bottom: 5px;">Nama Lengkap</label>
                <input type="text" value="{{ $user->name }}" style="width: 100%; padding: 10px; border: 1.5px solid #000; border-radius: 10px; background-color: #f9f9f9;" disabled>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-weight: bold; display: block; margin-bottom: 5px;">Email</label>
                <input type="text" value="{{ $user->email }}" style="width: 100%; padding: 10px; border: 1.5px solid #000; border-radius: 10px; background-color: #f9f9f9;" disabled>
            </div>
        </div>

    </div>
</div>
@endsection