<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'surat';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'unit_id',
        'kategori_id',
        'nomor_surat',
        'tanggal',
        'tanda_tangan',
        'surat_permintaan',
        'memo_permintaan',
        'memo_persetujuan',
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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
