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
        Schema::table('barang', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_barang_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('surat_id', 'fk_barang_to_surat')->references('id')->on('surat')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('surat_pesan_id', 'fk_barang_to_surat_pesanan')->references('id')->on('surat_pesanan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign('fk_barang_to_users');
            $table->dropForeign('fk_barang_to_surat');
            $table->dropForeign('fk_barang_to_surat_pesanan');
        });
    }
};
