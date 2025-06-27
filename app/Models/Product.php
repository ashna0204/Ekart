<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name', 'price', 'subcategory_id', 'image', 'status', 'is_favourite'];
    
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
}
