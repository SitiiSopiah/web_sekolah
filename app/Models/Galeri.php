<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $primaryKey = 'id_galeri';
    protected $fillable = [
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
