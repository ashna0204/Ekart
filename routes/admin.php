<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

use App\Http\Middleware\PreventBackHistory;

Route::middleware([PreventBackHistory::class])->group(function(){
Route::get('/login',[LoginController::class,'login'])->name('admin.login');
Route::post('/dologin',[LoginController::class,'dologin'])->name('admin.dologin');
Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
});

Route::middleware(['auth','admin'])->group(function(){

  Route::controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
  });

  Route::controller(ProductController::class)->group(function (){
    Route::get('/products/list', 'index')->name('products.index');
    Route::get('/products/form', 'create')->name('products.create');
    Route::post('/products/store', 'store')->name('products.store');
    Route::get('/products/edit/{id}', 'edit')->name('products.edit');
    Route::put('/products/store/{product}', 'update')->name('products.update');
    Route::get('/products/show/{product}', 'show')->name('products.show');
    Route::delete('/products/delete/{id}', 'destroy')->name('products.delete');
     Route::get('/get-childcategory/{subcategory_id}','getBySubcategory');
  });

  Route::controller(CategoryController::class)->group(function (){
    Route::get('/categories/list', 'index')->name('categories.index');
    Route::get('/categories/form', 'create')->name('categories.create');
    Route::post('/categories/store', 'store')->name('categories.store');
    Route::get('/categories/edit/{id}', 'edit')->name('category.edit');
    Route::put('/categories/store/{category}', 'update')->name('category.update');
    Route::delete('/categories/delete/{id}', 'destroy')->name('category.delete');
  });

  Route::controller(SubcategoryController::class)->group(function (){
    Route::get('/subcategories/index', 'index')->name('subcategories.index');
    Route::get('/subcategories/create', 'create')->name('subcategories.create');
    Route::post('/subcategories/store', 'store')->name('subcategories.store');
    Route::get('/subcategories/edit/{id}', 'edit')->name('subcategory.edit');
    Route::put('/subcategories/update/{subcategory}', 'update')->name('subcategory.update');
    Route::delete('/subcategories/delete/{id}', 'destroy')->name('subcategory.delete');
  });


});