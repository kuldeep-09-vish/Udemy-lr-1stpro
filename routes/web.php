<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms');


Route::get('/store-directory', function () {
    return view('store-directory');
})->name('store');


Route::prefix('shop')->group(function(){

    Route::get('/', function(){
        return view('shop.shop');
    })->name('shop');
    
    Route::get('/cart', function(){
        return view('shop.cart');
    })->name('cart');

    Route::get('/checkout', function(){
        return view('shop.checkout');
    })->name('checkout');

    Route::get('/grid', function(){
        return view('shop.shop-grid');
    })->name('grid');
    
    Route::get('/my-account', function(){
        return view('shop.my-account');
    })->name('account');

    Route::get('/track-your-order', function(){
        return view('shop.track-your-order');
    })->name('track');

    Route::get('/wishlist', function(){
        return view('shop.wishlist');
    })->name('wishlist');

    Route::get('/compare', function(){
        return view('shop.compare');
    })->name('compare');

});

//------------------------------------------------------------------------------------------------------------------

// Admin Panel Routes

Route::prefix('admin')->group(function(){

    Route::get('/', function(){
        return view('admin.login');
    })->name('admin.login');


    Route::get('/login', function(){
        return view('admin.login');
    })->name('login');




    Route::get('/widgets', function(){
        return view('admin.widgets');
    })->name('widgets');
});

Route::middleware(['auth.check'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function(){
            return view('admin.dashboard');
        })->name('dashboard'); 

        Route::get('/dashboard2', function(){
        return view('admin.index2');
        })->name('dashboard2'); 

        Route::get('/dashboard3', function(){
        return view('admin.index3');
        })->name('dashboard3');


    });

// Admin Panel Routes end

//-----------------------------------------------------------------------------------------------------------------------

// Admin Form Submition

Route::controller(AuthController::class)->group(function(){
    Route::post('/loginsubmit','login')->name('loginsubmit');
    Route::get('/logout','logout')->name('logout');

});

// Admin Form Submition end

//-----------------------------------------------------------------------------------------------------------------------

// User Registration & Login Routes

Route::prefix('user')->controller(UserAuthController::class)->group(function(){

    Route::post('/registered','UserRegister')->name('registered');
    Route::post('/userlogin','UserLogin')->name('userlogin');

});

// User Registration & Login Routes End

//-----------------------------------------------------------------------------------------------------------------------