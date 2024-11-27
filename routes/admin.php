<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\productOptionController;
use App\Http\Controllers\Admin\AdminDashpoardController;

Route::group(['prefix'=>'admin' , 'as'=>'admin.'] ,function () {
    Route::get('dashboard', [AdminDashpoardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');

    Route::put('profile', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
    Route::put('profile/pass', [ProfileController::class, 'UpdatePassword'])->name('profile.password.update');
    // slider Route
    Route::resource('Slider', SliderController::class);
    Route::resource('Category', CategoryController::class);
    Route::resource('product', ProductController::class);

    //product size route
    Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-ize.show-index');

    Route::resource('product-size', ProductSizeController::class);


    Route::resource('product-option', productOptionController::class);

});


