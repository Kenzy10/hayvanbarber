<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->string('role')->default('Super Admin');
            $table->string('status')->default('Aktif');
        });
    }

    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['role', 'status']);
        });
    }
};