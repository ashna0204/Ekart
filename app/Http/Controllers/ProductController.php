<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Colour;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\ProductColour;   

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    
        $products=Product::with(['subcategory.childcategories','subcategory.category'])->paginate(9);
        return view('product.index',compact('products'));
    }
}
