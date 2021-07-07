<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PostController::class, 'getIndex'])->name('blog.index');

Route::get('post/{id}', [PostController::class, 'getPost'])->name('blog.post');

Route::get('post/{id}/like', [PostController::class, 'getLikePost'])->name('blog.post.like');

Route::group(['prefix'=>'admin', 'middleware' => 'auth'],function () {

    Route::get('/', [PostController::class, 'getAdminIndex'])->name('admin.index');

    Route::get('create', [PostController::class, 'getAdminCreate'])->name('admin.create');

    Route::post('create', [PostController::class, 'postAdminCreate'])->name('admin.create');

    Route::get('edit/{id}', [PostController::class, 'getAdminEdit'])->name('admin.edit');

    Route::get('delete/{id}', [PostController::class, 'getAdminDelete'])->name('admin.delete');

    Route::post('edit', [PostController::class, 'postAdminUpdate'])->name('admin.update');

});

Route::view('about', 'other.about')->name('other.about');

Auth::routes();

Route::post('login',[\App\Http\Controllers\SigninController::class, 'signin'])->name('auth.login');
