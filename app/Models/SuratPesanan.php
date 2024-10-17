<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPesanan extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'surat_pesanan';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    

    protected $fillable = [
        'nomor_surat_pesan',
        'nomor_surat_pesan_detail',
        'tanggal_pesan',
        'kepada',
        'tujuan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
    
}
