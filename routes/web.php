<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowerController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/@{user:username}',[PublicProfileController::class, 'show'])->name('profile.show');

Route::get('/', [PostController::class, 'index'])->name('dashboard');

Route::get('/category/{category}', [PostController::class, 'category'])->name('post.byCategory');

Route::middleware('auth','verified')->group(function () {

    Route::get('/post/new', [PostController::class, 'create']
    )->name('post.create');

    Route::post('/post/upload', [PostController::class, 'store']
    )->name('post.store');

    Route::get('/@{username}/{post:slug}', [PostController::class, 'show'])
        ->name('post.show');
});


Route::get('/follow/{user}', [FollowerController::class, 'followUnfollow'])
    ->name('follow');



Route::post('/like/{post}', [LikeController::class, 'like'])->name('like');


Route::get('/test-users', [UserController::class, 'index']);


require __DIR__.'/auth.php';
