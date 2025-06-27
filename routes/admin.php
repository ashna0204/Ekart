<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
Route::get('/login',[LoginController::class,'login'])->name('admin.login');
Route::get('/dologin',[LoginController::class,'dologin'])->name('admin.dologin');

Route::middleware('auth:admin')->group(function(){

  Route::prefix('admin.')->controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
  });

  Route::prefix('admin.')->controller(ProductController::class)->group(function (){
    Route::get('/products/list', 'index')->name('products.index');
    Route::get('/products/form', 'create')->name('products.create');
    Route::post('/products/store', 'store')->name('products.store');
  });

  Route::prefix('admin.')->controller(CategoryController::class)->group(function (){
    Route::get('/categories/list', 'index')->name('categories.index');
    Route::get('/categories/form', 'create')->name('categories.create');
    Route::post('/categories/store', 'store')->name('categories.store');
  });

  Route::prefix('admin.')->controller(SubcategoryController::class)->group(function (){
    Route::get('/subcategories/index', 'index')->name('subcategories.index');
    Route::get('/subcategories/create', 'create')->name('subcategories.create');
    Route::post('/subcategories/store', 'store')->name('subcategories.store');
  });


});