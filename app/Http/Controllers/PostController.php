<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex(Store $session){
        $post = new Post();
        $posts = $post->getAll($session);

        return view('blog.index', ['posts' => $posts]);
    }

    public function getPost(Store $session, $id){
        $post = new Post();
        $post = $post->byId($session, $id);

        return view('blog.post', ['post' => $post]);
    }

    public function getAdminIndex(Store $session){
        $post = new Post();
        $posts = $post->all($session);

        return view('admin.index', ['posts' => $posts]);
    }

    public function getAdminCreate(Store $session){
        return view('admin.create');
    }

    public function getAdminEdit(Store $session, $id){
        $post = new Post();
        $post = $post->byId($session, $id);
        return view('admin.edit',['postId' => $id, 'post' => $post]);
    }

    public function postAdminCreate(Store $session, Request $request){
        $this->validate($request, [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $post->save();

        return redirect()->route('admin.index')
            ->with('info',"New post created, Title: " . $request->input('title'));
    }


    public function postAdminUpdate(Store $session, Request $request){
        $this->validate($request, [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        $post = new Post();
        $post->edit($session,$request->input('id'),$request->input('title'),$request->input('content'));
        return redirect()->route('admin.index')
            ->with('info',"Post updated, new Title: " . $request->input('title'));
    }
}
