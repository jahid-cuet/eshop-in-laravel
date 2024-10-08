<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Fronted Part
Route::get('/', [FrontedController::class, 'home']);
Route::get('front_category', [FrontedController::class, 'front_category'])->name('front_category');
Route::get('view_category/{slug}', [FrontedController::class, 'view_category'])->name('view_category');
Route::get('product_detail/{id}', [FrontedController::class, 'product_detail'])->name('product_detail');


// For User
Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('/delete-cart-item', [CartController::class, 'deleteProduct'])->name('cart.delete');
Route::post('/update_cart', [CartController::class, 'update_cart']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::get('/my_cart',[CartController::class,'my_cart']);
    Route::get('/checkout',[CheckoutController::class,'checkout']);
    Route::post('/place-order',[CheckoutController::class,'placeorder']);
    Route::get('/my_order',[OrderController::class,'my_order']);
    Route::get('view_order/{id}',[OrderController::class,'view_order']);
    Route::post('/proceed-to-pay',[CheckoutController::class,'RazorPay']);
   // Stripe Payment System
Route::controller(PaymentController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});
});




require __DIR__.'/auth.php';

// For admin

    Route::middleware('auth','admin')->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'index']);

    // Category Routes
    Route::get('add_category',[CategoryController::class,'add_category'])->name('add_category');
    Route::post('store_category',[CategoryController::class,'store_category'])->name('store_category');
    Route::get('category_view',[CategoryController::class,'category_view'])->name('category_view');
    Route::get('edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
    route::post('update_category/{id}',[CategoryController::class,'update_category'])->middleware(['auth','admin']);
    route::get('delete_category/{id}',[CategoryController::class,'delete_category'])->middleware(['auth','admin']);
  
    // Products Routes

    Route::get('add_product',[ProductController::class,'add_product'])->name('add_product');
    Route::post('store_product',[ProductController::class,'store_product'])->name('store_product');
    Route::get('show_product',[ProductController::class,'show_product'])->name('show_product');
    Route::get('edit_product/{id}',[ProductController::class,'edit_product'])->name('edit_product');
    Route::post('update_product/{id}',[ProductController::class,'update_product'])->name('update_product');
    Route::get('delete_product/{id}',[ProductController::class,'delete_product'])->name('delete_product');

    Route::get('view_orders',[OrderController::class,'view_orders'])->name('view_orders');
    Route::get('admin_view_order/{id}',[OrderController::class,'admin_view_order'])->name('admin_view_order');
    Route::post('update/{id}',[OrderController::class,'update'])->name('update');
    Route::get('order-history',[OrderController::class,'order_history'])->name('order-history');
    Route::get('users',[UserController::class,'users'])->name('users');
    Route::get('user_view/{id}',[UserController::class,'user_view']);
    
});