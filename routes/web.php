<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Factory;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('blog.index');

Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::get('post/{id}', [PostController::class, 'show'])->name('blog.post');

Route::group(['prefix'=>'admin'],function () {

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('create', function () {

        return view('admin.create');

    })->name('admin.create');

    Route::post('create', function (Request $request, Factory $validator) {
        $validation = $validator->make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
            ->route('admin.index')
            ->with('info','New post added with Title: ' . $request->input('title'));
    })->name('admin.create');

    Route::get('edit/{id}', function ($id) {

        $post = getPost($id);

        return view('admin.edit', ['post' => $post]);

    })->name('admin.edit');

    Route::post('edit', function (Request $request, Factory $validator) {
        $validation = $validator->make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
            ->route('admin.index')
            ->with('info','Post updated with new Title: ' . $request->input('title'));
    })->name('admin.update');

});
