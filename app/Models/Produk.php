<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['subkategori'] ?? false, function($query, $subkategori) {
            return $query->whereHas('subkategori', function($query) use ($subkategori) {
                $query->where('id', $subkategori);
            });
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori) {
            return $query->whereHas('kategori', function($query) use ($kategori) {
                $query->where('id', $kategori);
            });
        });

        $query->when($filters['subkategori_id'] ?? false, function($query, $subkategori) {
            return $query->whereHas('subkategori', function($query) use ($subkategori) {
                $query->where('id', $subkategori);
            });
        });

        $query->when($filters['kategori_id'] ?? false, function($query, $kategori) {
            return $query->whereHas('kategori', function($query) use ($kategori) {
                $query->where('id', $kategori);
            });
        });
    }

    protected $guarded = ['id'];

    public function subkategori()
    {
        return $this->belongsTo(SubKategori::class,'subkategori_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
    public function variasi()
    {
        return $this->hasMany(Variasi::class);
    }  
}
