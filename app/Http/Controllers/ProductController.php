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
        $fashionCategory = Category::where('name', 'Fashion')->first(); 
        $electronicsCategory = Category::where('name', 'Electronics')->first();
        $homeKitchenCategory = Category::where('name', 'Home & Kitchen')->first();
        $healthBeautyCategory = Category::where('name', 'Health & Beauty')->first();

        return view('product.index',compact('products','electronicsCategory','homeKitchenCategory','healthBeautyCategory'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::with('subcategories.childcategories')->where('slug', $slug)->firstOrFail();
        
        $products = Product::whereHas('subcategory', function($q) use ($category) {
            $q->where('category_id', $category->id);
        })->paginate(9);

        return view('product.index', compact('products', 'category'));
    }

    public function subcategoryProducts($slug)
    {
        $subcategory = Subcategory::with('childcategories')->where('slug', $slug)->firstOrFail();

        $products = Product::where('subcategory_id', $subcategory->id)->paginate(9);

        return view('product.index', compact('products', 'subcategory'));
    }

    // public function childcategoryProducts($slug)
    // {
    //     $childcategory = Childcategory::where('slug', $slug)->firstOrFail();

    //     $products = Product::where('childcategory_id', $childcategory->id)->paginate(9);

    //     return view('product.index', compact('products', 'childcategory'));
    // }

    public function subcategoryChildcategoryProducts($subcategory_slug, $childcategory_slug)
    {
        $subcategory = Subcategory::where('slug', $subcategory_slug)->firstOrFail();

        $childcategory = Childcategory::where('slug', $childcategory_slug)
            ->where('subcategory_id', $subcategory->id)
            ->firstOrFail();

        $products = Product::where('subcategory_id', $subcategory->id)
            ->where('childcategory_id', $childcategory->id)
            ->paginate(9);

        return view('product.index', [
            'products' => $products,
            'subcategory' => $subcategory,
            'childcategory' => $childcategory,
        ]);
    }


}
