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
    public function edit($id){
        $subcategory= Subcategory::findorfail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit',compact('categories','subcategory'));
    }
    public function update(Request $request, Subcategory $subcategory){

        $validated =$request->validate([
            'category_id'=>'required|exists:categories,id',
            'name'=>'required'
        ]);

        $subcategory->update($validated);

       return redirect()->route('subcategories.index')->with('success',"Subcategory updated successfully.");
    }
    public function destroy($id){
        $subcategory=Subcategory::findorfail($id);
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success','Subcategory deleted successfully');
    }
}
