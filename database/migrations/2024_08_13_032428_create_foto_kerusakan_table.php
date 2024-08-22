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
        Schema::create('foto_kerusakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id');
            $table->string('foto');
            $table->string('tipe_foto')->default('USER');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_kerusakan');
    }
};
