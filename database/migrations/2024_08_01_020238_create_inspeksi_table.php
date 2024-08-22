<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspeksi', function (Blueprint $table) {
            $table->unsignedBigInteger('inspeksi_id')->primary();
            $table->unsignedBigInteger('permohonan_id');
            $table->unsignedBigInteger('inspektor_id');
            $table->date('tanggal_inspeksi')->nullable();
            $table->text('catatan_inspeksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksi');
    }
};
