<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Product; 
use Illuminate\Support\Str;

class Childcategory extends Model
{
    protected $fillable = ['subcategory_id','name'];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public static function booted(){
        static::creating(function ($category){
            $category->slug = Str::slug($category->name);
        });
    }
}
