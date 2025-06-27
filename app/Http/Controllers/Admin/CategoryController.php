<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $request->validate([
        'name'=>'required'
       ]);

       Category::create([
           'name' => $request->name,
       ]);
       
       return redirect()->route('categories.index')->with('success',"Category created successfully.");
    }
}
