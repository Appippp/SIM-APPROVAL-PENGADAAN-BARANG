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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_barang_to_users');
            $table->foreignId('surat_id')->nullable()->index('fk_barang_to_surat');
            $table->foreignId('surat_pesan_id')->nullable()->index('fk_barang_to_surat_pesanan');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('stok')->nullable();
            $table->integer('jumlah');
            $table->longText('keterangan')->nullable();
            $table->string('merk')->nullable();
            $table->longText('uraian_spesifikasi')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('total')->nullable();
            $table->string('untuk')->nullable();
            $table->string('keterangan_rejected')->nullable();
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
        Schema::dropIfExists('barang');
    }
};
