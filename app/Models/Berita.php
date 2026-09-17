<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
}
