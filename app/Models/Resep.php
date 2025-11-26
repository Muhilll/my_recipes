<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'nama',
        'persiapan',
        'masak',
        'hasil',
        'langkah',
        'bahan',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class);
    }
}
