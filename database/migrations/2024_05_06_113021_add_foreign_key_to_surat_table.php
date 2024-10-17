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
        Schema::table('surat', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_surat_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('unit_id', 'fk_surat_to_unit')->references('id')->on('unit')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kategori_id', 'fk_surat_to_kategori')->references('id')->on('kategori')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropForeign('fk_surat_to_users');
            $table->dropForeign('fk_surat_to_unit');
            $table->dropForeign('fk_surat_to_kategori');
        });
    }
};
