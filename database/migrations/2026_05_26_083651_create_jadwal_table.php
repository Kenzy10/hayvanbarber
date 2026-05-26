<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tukang_cukur_id')
                ->constrained('tukang_cukur')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->enum('status', [
                'tersedia',
                'dibooking',
                'selesai'
            ])->default('tersedia');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};