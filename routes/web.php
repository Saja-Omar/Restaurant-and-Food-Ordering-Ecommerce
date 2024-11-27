<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\FrontEnd\ProfileController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\AdminDashpoardController;
use App\Http\Controllers\FrontEnd\FrontProfileController;
use App\Http\Controllers\FrontEnd\ProfileUserUpdateController;



//admin auth routes
Route::get('login-admin', [AdminAuthController::class, 'index'])->name('login.new');


Route::get('dashboard',[FrontEndController::class,'dashindex'])->name('dashboard');
Route::put('profile',[FrontProfileController::class,'upadteprofile'])->name('profile_update');
Route::put('Userprofile', [ProfileUserUpdateController::class, 'UpdateProfile'])->name('UpdateProfileUser');
// Route::put('imageUser',[FrontProfileController::class,'upadteimageUser'])->name('imageUser');



require __DIR__.'/auth.php';
Route::get('/',[FrontEndController::class,'index'])->name('home');

Route::get('/product/{slug}', [FrontEndController::class, 'showProduct'])->name('product.show');
Route::get('/load_product_model/{productId}', [FrontEndController::class, 'load_ProductModal'])->name('load_product_modal');


// add to cart route
Route::post('add_To_cart',[FrontEndController::class,'addTocart'])->name('add_to_cart');
