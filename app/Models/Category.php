<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use Illuminate\Support\Str;
class Category extends Model
{
    protected $fillable = ['name'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public static function booted(){
            static::creating(function ($category){
            $category->slug = Str::slug($category->name);
        });
    }
}
