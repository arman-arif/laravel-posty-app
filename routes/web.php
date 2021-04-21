<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::get('post/{id}', function ($id) {

    if ($id == 1) {
        $post = [
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you right on track with Laravel!',
        ];
    } elseif($id == 2) {
        $post = [
            'title' => 'The next Steps',
            'content' => 'Understanding the Basics is great, but you need to be able to make the next steps.',
        ];
    } else {
        $post = [
            'title' => 'Something else',
            'content' => 'Some other content',
        ];
    }

    return view('blog.post', ['post' => $post]);

})->name('blog.post');

Route::group(['prefix'=>'admin'],function () {
    
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    
    Route::get('create', function () {
        return view('admin.create');
    })->name('admin.create');
    
    Route::post('create', function (Request $request) {
        return "Save post";
    })->name('admin.create');
    
    Route::get('edit/{id}', function () {
        return view('admin.edit');
    })->name('admin.edit');
    
    Route::post('edit', function (Request $request) {
        return "Post update";
    })->name('admin.update');
    
});