<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('blog.index');
    })->name('blog.index');
    
    Route::get('about', function () {
        return view('other.about');
    })->name('other.about');
    
    Route::get('post/{id}', function () {
        return view('blog.post');
    })->name('blog.post');


Route::group(['prefix'=>'admin'],function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    
    Route::get('create', function () {
        return view('admin.create');
    })->name('admin.create');
    
    Route::post('create', function () {
        return "Save post";
    })->name('admin.create');
    
    Route::get('edit/{id}', function () {
        return view('admin.edit');
    })->name('admin.edit');
    
    Route::post('edit', function () {
        return "Post update";
    })->name('admin.update');
});