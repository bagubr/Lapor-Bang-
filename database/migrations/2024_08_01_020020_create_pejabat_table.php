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
        Schema::create('pejabat', function (Blueprint $table) {
            $table->unsignedBigInteger('pejabat_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pejabat');
            $table->string('telp', 13);
            $table->string('address');
            $table->string('jabatan', 20);
            $table->string('sk_jabatan', 30);
            $table->string('nip', 20);
            $table->string('tipe_pejabat', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pejabat');
    }
};
