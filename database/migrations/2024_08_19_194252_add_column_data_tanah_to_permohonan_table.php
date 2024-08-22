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
        Schema::table('permohonan', function (Blueprint $table) {
            $table->string('status_tanah')->nullable();
            $table->string('nomor_sertifikat')->nullable();
            $table->string('nama_sertifikat')->nullable();
            $table->string('kode_kib')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('permohonan', function (Blueprint $table) {
        //     //
        // });
    }
};
