<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// routes/web.php
// Define route for the categories list
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Define more routes as needed

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Auth::routes();
    Route::group(['prefix' => 'dash'], function() {
        Route::resource('categories', CategoryController::class);
        Route::view('/', 'dashboard')->name('dashboard');
        Route::view('/product', 'products.index')->name('products.index');
    });
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dash',function(){
return view('dashboard');
});
Route::get('/product',function(){
return view('products.index');
});
Route::get('/landing',function(){
    return view('landing');
    });
Route::group([
    'middleware'=>'IsAdmin'
],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

//Route::post();
//Route::get();
//Route::put();
//Route::delete();
//Route::resource();
//Route::('url','view');





Route::get('/index',function(){
    return view('index');

})->name('index');
Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');
