<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🟢 Diubah menjadi 'layanan' (tanpa S) sesuai foreign key tabel booking
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            // 🟢 Diubah menjadi 'layanan' sesuai dengan kolom yang ada di database kamu
            $table->string('layanan'); 
            $table->integer('harga');
            $table->string('durasi');
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // 🟢 Diubah juga di sini agar pas di-rollback tidak error
        Schema::dropIfExists('layanan');
    }
};