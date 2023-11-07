<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\LocalizationController;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

Route::get('/',[PostController::class,'index'])->name('home');

Route::prefix('posts')->group(function(){
    Route::get('{post}',[PostController::class,'show'])->name('posts.show');
    Route::post('{post}/comments',[CommentController::class,'store'])->name('comments.store');
});


Route::prefix('products')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('products.all');
    Route::get('{product}',[ProductController::class,'show'])->name('products.show');}
);


Route::post('newsletter',NewsletterController::class);


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
