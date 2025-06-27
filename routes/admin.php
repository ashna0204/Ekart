<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/login',[LoginController::class,'login'])->name('admin.login');
Route::get('/dologin',[LoginController::class,'dologin'])->name('admin.dologin');

Route::middleware('auth:admin')->group(function(){
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
Route::get('/list',[ProductController::class,'list'])->name('admin.products.list');
Route::get('/categories',[ProductController::class,'categories'])->name('admin.products.categories');
Route::get('/form',[ProductController::class,'form'])->name('admin.products.form');

});