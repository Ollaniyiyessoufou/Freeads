<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\searchController;
use App\Http\Controllers\produitsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\MyCategoriesController;
use App\Models\MyCategories;
/* use App\Http\Middleware\Auth; */

Route::get('/', [UserController::class, 'register'])->name('register_get');
Route::post('/', [UserController::class, 'store'])->name('register_post');
Route::get('/connect', [UserController::class, 'connect'])->name('connect_get');
Route::post('/connect', [UserController::class, 'auth'])->name('connect_post');
Route::get('/verify-mail', [UserController::class, 'verify_mail'])->name('verify-mail');
Route::post('/verify-mail', [UserController::class, 'confirm_code'])->name('confirm_code');
Route::get('/resend_code', [UserController::class, 'resend_code'])->name('resend_code');

/* Route::post('login',function(){return view('landing');})->name('login'); */


Route::middleware('auth')->group(function () {

    Route::get('/produits', [produitsController::class, 'index']);
    Route::get('/produits', [produitsController::class, 'search']);
    Route::get('/produits/{id}', [produitsController::class, 'filter']);

    Route::get('/profile',[produitsController::class, 'profile']);


    Route::get('/index', [AdController::class,'showAds'])->name('home');

    Route::resource('posts', AdController::class);

    Route::get('/categoryAd',[MyCategoriesController::class,'index'])->name('home_cat');

    Route::resource('category', MyCategoriesController::class);

    Route::get('/search',[AdController::class,'search']);
    Route::post('/search',[AdController::class,'research']);

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/show_profile', [UserController::class, 'show_profile'])->name('show_profile');
    Route::get('/update_profile', [UserController::class, 'update_profile'])->name('update_profile');
    Route::post('/update_profile', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/delete_profile', [UserController::class, 'delete_profile'])->name('delete_profile');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

