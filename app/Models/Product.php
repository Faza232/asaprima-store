<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
        });

        $query->when($filters['subcategory'] ?? false, function($query, $subcategory) {
            return $query->whereHas('subcategory', function($query) use ($subcategory) {
                $query->where('id', $subcategory);
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('id', $category);
            });
        });

        $query->when($filters['subcategory_id'] ?? false, function($query, $subcategory) {
            return $query->whereHas('subcategory', function($query) use ($subcategory) {
                $query->where('id', $subcategory);
            });
        });

        $query->when($filters['category_id'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('id', $category);
            });
        });
    }

    protected $guarded = ['id'];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function variasi()
    {
        return $this->hasMany(Variasi::class);
    }  
    
}
