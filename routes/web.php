<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\LocalizationController;

Route::group([
    'middleware' => ['cookie-consent']
], function(){
    // FRONT
    Route::get('/',[SiteController::class,'home'])->name('home');
    Route::get('/Contact', [SiteController::class,'contact'])->name('contact');
    Route::get('/Notre-histoire', [SiteController::class,'notrehistoire'])->name('notrehistoire');
    Route::get('/Mentions-legals', [SiteController::class,'mentionslegals'])->name('mentionslegals');
    Route::get('/La-miellerie', [SiteController::class,'lamiellerie'])->name('lamiellerie');
    Route::get('/La-ruche', [SiteController::class,'laruche'])->name('laruche');
});

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

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
