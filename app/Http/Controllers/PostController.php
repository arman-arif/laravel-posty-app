<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('blog.index', ['posts' => $posts]);
    }

    public function getPost($id){
        $post = Post::where('id',$id)->first();
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminIndex(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getAdminCreate(){
        return view('admin.create');
    }

    public function getAdminEdit($id){
        $post = Post::find($id);
        return view('admin.edit',['post' => $post]);
    }

    public function postAdminCreate(Request $request){
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

    public function postAdminUpdate(Request $request){
        $this->validate($request, [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
        ]);
        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('admin.index')
            ->with('info',"Post updated, new Title: " . $request->input('title'));
    }

    public function getAdminDelete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.index')->with('info',"Post deleted!");
    }

}
