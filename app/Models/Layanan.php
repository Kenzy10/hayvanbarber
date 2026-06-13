<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan'; // Mengarah ke tabel tunggal tanpa S

    // 🟢 Izinkan kolom 'layanan' untuk menyimpan data string nama layanan kamu
    protected $fillable = ['layanan', 'harga', 'durasi', 'status']; 
}