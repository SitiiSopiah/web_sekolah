<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Relasi ke berita & pengumuman
    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_user', 'id_user');
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'id_user', 'id_user');
    }

    // Biar login pakai username, bukan email
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
