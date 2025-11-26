<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'slug', 'nama'
    ];

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}
