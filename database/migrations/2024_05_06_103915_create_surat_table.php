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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_surat_to_users');
            $table->foreignId('unit_id')->nullable()->index('fk_surat_to_unit');
            $table->foreignId('kategori_id')->nullable()->index('fk_surat_to_kategori');
            $table->string('nomor_surat')->unique();
            $table->date('tanggal');
            $table->text('tanda_tangan')->nullable();
            $table->string('surat_permintaan')->default('Pending');
            $table->string('memo_permintaan')->default('Pending');
            $table->string('memo_persetujuan')->default('Pending');
            $table->string('manager_klinik_approve')->default('Pending');
            $table->string('admin_updated')->default('Pending');
            $table->string('manager_operational_approve')->default('Pending');
            $table->string('direktur_approve')->default('Pending');
            $table->string('kepala_bidang_approve')->default('Pending');
            $table->string('manager_keuangan_approve')->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
