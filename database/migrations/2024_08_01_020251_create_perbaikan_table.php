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
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->unsignedBigInteger('perbaikan_id')->primary();
            $table->unsignedBigInteger('permohonan_id');
            $table->unsignedBigInteger('kontraktor_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('biaya', 10, 2);
            $table->string('status', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan');
    }
};
