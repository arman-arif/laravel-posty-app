<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('blog.index', ['posts' => $posts]);
    }

    public function getPost($id){
//        $post = Post::where('id',$id)->first();
        $post = Post::where('id',$id)->with('likes','tags')->first();
        return view('blog.post', ['post' => $post]);
    }

    public function getLikePost($id){
        $post = Post::where('id',$id)->first();
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
    }

    public function getAdminIndex(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getAdminCreate(){
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags]);
    }

    public function getAdminEdit($id){
        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.edit',['post' => $post,'tags' => $tags]);
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
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

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
//        $post->detach();
//        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')
            ->with('info',"Post updated, new Title: " . $request->input('title'));
    }

    public function getAdminDelete($id){
        $post = Post::find($id);
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->with('info',"Post deleted!");
    }

}
