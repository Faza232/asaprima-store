<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subkategori()
    {
        return $this->belongsTo(SubKategori::class);
    }
    public function variasi()
    {
        return $this->hasMany(Variasi::class);
    }  
}
