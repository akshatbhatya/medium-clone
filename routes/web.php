<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class,"index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth","verified"])->group(function(){
    Route::get('/post/create',[PostController::class,"create"])->name("post.create");
    Route::post('/post/create', [PostController::class,"store"])->name("post.store");
    Route::get('/profile/{username}/{post}/{id}', [PostController::class, "show"])->name("post.show");
});
require __DIR__.'/auth.php';
