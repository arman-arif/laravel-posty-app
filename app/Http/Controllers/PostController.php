<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function index(Store $session){
        $post = new Post();
        $posts = $post->all($session);

        return view('blog.index', ['posts' => $posts]);
    }

    public function show(Store $session, $id){
        $post = new Post();
        $post = $post->byId($session, $id);

        return view('blog.post', ['post' => $post]);
    }
}
