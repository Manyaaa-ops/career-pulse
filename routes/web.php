<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/posts', [FrontendController::class, 'posts'])->name('posts');
Route::get('/post/{slug}', [FrontendController::class, 'postDetail'])->name('post.detail');

Route::prefix('ajax')->group(function () {
    Route::get('/search', [PostController::class, 'search'])->name('ajax.search');
    Route::get('/filter/category/{id}', [PostController::class, 'filterByCategory'])->name('ajax.filter.category');
    Route::get('/filter/date', [PostController::class, 'filterByDate'])->name('ajax.filter.date');
    Route::get('/filter', [PostController::class, 'filter'])->name('ajax.filter');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginCheck'])->name('admin.login.check');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
        Route::get('/posts/create', [AdminController::class, 'createPost'])->name('admin.posts.create');
        Route::post('/posts', [AdminController::class, 'storePost'])->name('admin.posts.store');
        Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
        Route::put('/posts/{id}', [AdminController::class, 'updatePost'])->name('admin.posts.update');
        Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.posts.delete');
        Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
        Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
        Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
        Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});