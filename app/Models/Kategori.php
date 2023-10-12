<?php

namespace App\Models;

use App\Models\SubKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function subkategori()
    {
        return $this->hasMany(SubKategori::class);
    }
}
