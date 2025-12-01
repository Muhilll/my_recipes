<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'nama',
        'email',
        'password',
        'jkl',
        'alamat',
        'no_hp',
        'role',
        'status',
        'tgl_daftar',
    ];

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class);
    }
}
