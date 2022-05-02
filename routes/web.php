<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\SiteController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('products', ProductController::class);
    
    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);

    //Para criar o controller informar conforme abaixo
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', [SiteController::class, 'index']);
Route::any('/search', [SiteController::class, 'search'])->name('site.search');
Route::resource('site', SiteController::class);
Route::get('/inicio', [SiteController::class, 'index'])->name('site.inicio');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



