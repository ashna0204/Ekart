<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('subcategory.category')->get();
       
        return view('admin.products.index',compact('products'));
    }
     public function create(){
        $subcategories = Subcategory::with('category')->get();
        return view('admin.products.create', compact('subcategories'));
    }

    public function store(Request $request){
     
      $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        
        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['is_favourite'] = $request->has('is_favourite') ? 1 : 0;

        if($request->hasFile('image')){
            $validated['image'] =$request->file('image')->store('products', 'public');
        }


        $product = Product::create($validated);

        return redirect()->route('products.index')->with('success',"Product added Successfully");
    }

    public function edit($id){
        $product = Product::findorfail($id);
       $subcategories = Subcategory::with('category')->get();
        return view('admin.products.edit',compact('product','subcategories'));
    }

    public function update(Request $request, Product $product){
       $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

         $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['is_favourite'] = $request->has('is_favourite') ? 1 : 0;

        if($request->hasFile('image')){
            $validated['image'] =$request->file('image')->store('products', 'public');
        }


        $product = $product->update($validated);

        return redirect()->route('products.index')->with('success',"Product added Successfully");
    }

    public function show($id){
        $product = Product::findorfail($id);
        return view('admin.products.view',compact('product'));
    }

    public function destroy($id){
        $product=Product::findorfail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted successfully');
    }
    
}
