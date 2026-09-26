<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];
}
