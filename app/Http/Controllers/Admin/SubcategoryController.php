<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
     public function index(){
        $categories = Category::all();
        $subcategories = Subcategory::with('category')->get();
        return view('admin.subcategory.index',compact('subcategories', 'categories'));
    }
    public function create(){
        $categories = Category::all();

        return view('admin.subcategory.create', compact('categories'));
    }
    public function store(Request $request){
       $request->validate([
        'category_id'=>'required|exists:categories,id',
        'subcategory_name'=>'required'
       ]);

       Subcategory::create([
           'category_id' => $request->category_id,
           'name' => $request->subcategory_name,
       ]);

       return redirect()->route('subcategories.index')->with('success',"Subcategory created successfully.");
    }
}
