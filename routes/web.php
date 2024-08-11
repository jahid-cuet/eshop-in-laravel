<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
});

require __DIR__.'/auth.php';

// For admin

    Route::middleware('auth','admin')->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'index']);
    Route::get('add_category',[CategoryController::class,'add_category'])->name('add_category');
    Route::post('store_category',[CategoryController::class,'store_category'])->name('store_category');
    Route::get('category_view',[CategoryController::class,'category_view'])->name('category_view');
    Route::get('edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
    route::post('update_category/{id}',[CategoryController::class,'update_category'])->middleware(['auth','admin']);
    route::get('delete_category/{id}',[CategoryController::class,'delete_category'])->middleware(['auth','admin']);
  
});