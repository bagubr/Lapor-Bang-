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
        Schema::create('dokument', function (Blueprint $table) {
            $table->increments('dokument_id')->primary();
            $table->unsignedSmallInteger('permohonan_id');
            $table->string('tipe_dokument', 50);
            $table->string('file');
            $table->date('tanggal_upload');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokument');
    }
};
