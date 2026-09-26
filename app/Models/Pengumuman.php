<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumen';
    protected $primaryKey = 'id_pengumuman';
    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'id_user'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id_user');
    }
}
