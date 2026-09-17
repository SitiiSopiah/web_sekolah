<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $primaryKey = 'id_ekskul';
    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar'
    ];
}
