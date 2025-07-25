<?php

namespace App\Models;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Colour;
use App\Models\Size;
use App\Models\Childcategory;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name', 'price', 'subcategory_id', 'image', 'status', 'is_favourite','brand_id','childcategory_id'];
    
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    
    public function getStatusNameAttribute(){
        return $this->status? 'Active' : 'inActive';
    }

    public function getIsfavouriteNameAttribute(){
        return $this->is_favourite? 'Favourite' : 'Not Favourite';
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function colours()
    {
        return $this->belongsToMany(Colour::class, 'productcolour');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'productsize');

    }
    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }
}
