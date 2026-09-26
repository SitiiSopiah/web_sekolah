<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk',
    ];
}
