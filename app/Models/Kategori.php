<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // use HasFactory;

    protected $table = 'kategori';

    protected $date = [
        'created_at',
        'updated_at', 
        'deleted_at'
    ];

    protected $fillable = [
        'nama_kategori',
        'created_at',
        'updated_at', 
        'deleted_at',
    ];


    public function surat()
    {
        return $this->hasMany(Surat::class);
    }

   
}
