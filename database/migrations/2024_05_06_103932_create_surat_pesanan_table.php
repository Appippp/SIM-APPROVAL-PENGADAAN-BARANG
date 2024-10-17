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
        Schema::create('surat_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat_pesan')->unique();
            $table->string('nomor_surat_pesan_detail')->nullable();
            $table->date('tanggal_pesan');
            $table->string('kepada')->nullable();
            $table->string('tujuan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pesanan');
    }
};
