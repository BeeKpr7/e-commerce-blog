<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;

// Admin
Route::prefix('admin')->middleware('can:admin','auth')->group(function(){
    Route::resource('posts', PostController::class)->except('show');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('skus', SkuController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });