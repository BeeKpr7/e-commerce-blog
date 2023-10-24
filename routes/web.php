<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\LocalizationController;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

Route::get('/',[PostController::class,'index'])->name('home');

Route::get('posts/{post}',[PostController::class,'show'])->name('show');
Route::post('posts/{post}/comments',[CommentController::class,'store']);

Route::post('newsletter',NewsletterController::class);

// Admin
Route::prefix('admin')->middleware('can:admin')->group(function(){
    Route::resource('posts', AdminPostController::class)->except('show');
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
