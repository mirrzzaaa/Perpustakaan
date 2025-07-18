<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['judul', 'penulis', 'tahun', 'stok', 'cover'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
