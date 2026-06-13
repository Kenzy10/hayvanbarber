<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggan')
                ->cascadeOnDelete();


            $table->foreignId('layanan_id')
                ->constrained('layanan')
                ->cascadeOnDelete();

            $table->foreignId('tukang_cukur_id')
                ->constrained('tukang_cukur')
                ->cascadeOnDelete();

            $table->foreignId('tempat_id')
                ->constrained('tempat')
                ->cascadeOnDelete();

            $table->foreignId('jadwal_id')
                ->constrained('jadwal')
                ->cascadeOnDelete();

            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->integer('total_harga')->nullable();

            $table->enum('status_booking', [
                'pending',
                'confirmed',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};