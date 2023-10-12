<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];   
    public function kategori()  //category = nama relasi
    {
        return $this->belongsTo(Kategori::class);
    }  
}
