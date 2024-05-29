<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//Route::group([
  //  "prefix"=> LaravelLocalization::setLocale()
    //'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//],function(){
  //  Route::group([
    //    'prefix'=>"dash"
    //],function(){
      //  Route::view('/dash', 'dashboard');
        //Route::view('/product','products.index');
    //});
//});

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


Auth::routes();


Route::get('/index',function(){
    return view('index');

})->name('index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
