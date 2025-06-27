<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        return view('admin.products.list');
    }
     public function form(){
        return view('admin.products.form');
    }
    public function categories(){
        return view('admin.products.categories');
    }
}
