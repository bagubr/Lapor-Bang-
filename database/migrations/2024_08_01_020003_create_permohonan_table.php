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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('permohonan_id')->primary();
            $table->unsignedBigInteger('bangunan_id');
            $table->unsignedBigInteger('pejabat_id');
            $table->date('tanggal_permohonan');
            $table->string('status', 50);
            $table->string('klasifikasi')->nullable();
            $table->string('deskripsi_singkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
