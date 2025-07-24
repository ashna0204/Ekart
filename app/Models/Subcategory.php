<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $fillable =[
        'name',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function childcategories()
    {
        return $this->hasMany(Childcategory::class);
    }

    public static function booted(){
        static::creating(function ($subcategory){
            $subcategory->slug = Str::slug($subcategory->name);
        });
    }
    
}
