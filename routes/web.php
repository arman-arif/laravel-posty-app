<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::get('post/{id}', function ($id) {

    $post = getPost($id);

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
        return redirect()
            ->route('admin.index')
            ->with('info','New post added with Title ' . $request->input('title'));
    })->name('admin.create');

    Route::get('edit/{id}', function ($id) {

        $post = getPost($id);

        return view('admin.edit', ['post' => $post]);

    })->name('admin.edit');

    Route::post('edit', function (Request $request) {
        return redirect()
            ->route('admin.index')
            ->with('info','Post updated with new Title ' . $request->input('title'));
    })->name('admin.update');

});



function getPost($id){
    if ($id == 1) {
        return [
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you right on track with Laravel!',
        ];
    }
    if($id == 2) {
        return [
            'title' => 'The next Steps',
            'content' => 'Understanding the Basics is great, but you need to be able to make the next steps.',
        ];
    }
    return [
            'title' => 'Something else',
            'content' => 'Some other content',
        ];

}
