<?php

namespace App\Models;

use App\Models\NomorSurat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    // use HasFactory;

    protected $table = 'unit';

    protected $fillable = [
        'nama_unit',
    ];
   
}
