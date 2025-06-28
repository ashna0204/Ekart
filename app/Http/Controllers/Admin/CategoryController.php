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
    public function edit($id){
        $category = Category::findorfail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request , Category $category){
        $validated= $request->validate([
        'name'=>'required'
       ]);
         
       $category->update($validated);
       return redirect()->route('categories.index')->with('success',"Category Updated successfully.");
    }

    public function destroy($id){
        $category=Category::findorfail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success','category deleted successfully');
    }
}
