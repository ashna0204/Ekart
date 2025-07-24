<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('admin')->middleware('web')->group(function () {
    require base_path('routes/admin.php');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');


Route::get('/products/category/{slug}', [ProductController::class, 'categoryProducts'])->name('products.by.category');
Route::get('/products/subcategory/{slug}', [ProductController::class, 'subcategoryProducts'])->name('products.by.subcategory');
// Route::get('/products/subcategory/childcategory/{slug}', [ProductController::class, 'childcategoryProducts'])->name('products.by.childcategory');
Route::get('/products/{subcategory_slug}/{childcategory_slug}', [ProductController::class, 'subcategoryChildcategoryProducts'])->name('products.by.subcategory.childcategory');

});

require __DIR__.'/auth.php';
