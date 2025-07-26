<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Colour;
use App\Models\Size;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = ['product_id','colour_id','size_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function colour(){
        return $this->belongsTo(Colour::class,'colour_id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
}
