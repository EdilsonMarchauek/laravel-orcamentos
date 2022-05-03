<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/index', [SiteController::class, 'index']);
Route::any('/search', [SiteController::class, 'search'])->name('site.search');
Route::resource('site', SiteController::class);
Route::get('/inicio', [SiteController::class, 'index'])->name('site.inicio');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/teste', function () {
    return storage_path();
 });

 Route::get('/link', function () {
    $target = '/var/www/html/divulguenaweb.com.br/web/lara/storage/app/public';
    $shorcut = '/var/www/html/divulguenaweb.com.br/web/storage';
    symlink($target, $shorcut);
 });

 Route::get('/clear', function() {

    Artisan::call('cache:clear');
    
    dd("Cache Clear All");

});



