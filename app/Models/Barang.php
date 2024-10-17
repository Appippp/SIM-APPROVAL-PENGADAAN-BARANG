<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // use HasFactory;

    protected $table = 'barang';


    protected $date =[
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'user_id',
        'surat_id',
        'surat_pesan_id',
        'nama_barang',
        'satuan',
        'stok',
        'jumlah',
        'keterangan',
        'merk',
        'uraian_spesifikasi',
        'harga',
        'sub_total',
        'total',
        'untuk',
        'keterangan_rejected',
        'manager_klinik_approve',
        'admin_updated',
        'manager_operational_approve',
        'direktur_approve',
        'kepala_bidang_approve',
        'manager_keuangan_approve',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }

    public function surat_pesan()
    {
        return $this->belongsTo(SuratPesanan::class, 'surat_pesan_id', 'id');
    }



}
