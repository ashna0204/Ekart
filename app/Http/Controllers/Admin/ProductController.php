<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory; 
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Colour;
use App\Models\Size;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('subcategory.category','childcategory.subcategory')->get();
       
        return view('admin.products.index',compact('products'));
    }
     public function create(){
        $subcategories = Subcategory::with('category')->get();
        $childcategories=Childcategory::with('subcategory')->get();
        $brands= Brand::all();
        $colours = Colour::all();
        $sizes = Size::all();

        return view('admin.products.create', compact('subcategories','brands','childcategories','colours', 'sizes'));
       
    }

    public function store(Request $request){
     
      $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'subcategory_id'=> 'required|exists:subcategories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'childcategory_id' => 'nullable|exists:childcategories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'colours' => 'nullable|array',
            'sizes' => 'nullable|array'
        ]);
        
        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['is_favourite'] = $request->has('is_favourite') ? 1 : 0;

        if($request->hasFile('image')){
            $validated['image'] =$request->file('image')->store('products', 'public');
        }


        $product = Product::create($validated);

        //create product variant
         if(!empty($request->colours)&& !empty($request->sizes)){
            foreach($request->colours as $colourId){
                foreach($request->sizes as $sizeId){
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'colour_id' => $colourId,
                        'size_id' => $sizeId
                    ]);
                }
            }
         }

        return redirect()->route('products.index')->with('success',"Product added Successfully");
    }

    public function edit($id){
        $product = Product::findorfail($id);
        $subcategories = Subcategory::with('category')->get();
        $childcategories=Childcategory::with('subcategory')->get();
        $brands= Brand::all();
        return view('admin.products.edit',compact('product','subcategories','brands','childcategories'));
    }

    public function update(Request $request, Product $product){
       $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'brand_id' => 'nullable|exists:brands,id',
            'childcategory_id' => 'nullable|exists:childcategories,id',
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
        $product = Product::with('variants.size','variants.colour')->findorfail($id);
        return view('admin.products.view',compact('product'));
    }

    public function destroy($id){
        $product=Product::findorfail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted successfully');
    }

    public function getBySubcategory($subcategory_id){
        $childcategories= Childcategory::where('subcategory_id',$subcategory_id)->get();
        return response()->json($childcategories);
    }
    
}
