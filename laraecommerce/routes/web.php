<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}', 'update');
    });

    // livewire Brand
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
    });
});
