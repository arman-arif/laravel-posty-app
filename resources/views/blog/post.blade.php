@extends('layouts.master', ['title' => $post->title])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{ $post->title }}</p>
        </div>

        <div class="col-md-12">
            <p>{{ count($post->likes) }} Likes |
                <a href="{{ route('blog.post.like', $post->id) }}">Like</a></p>
        </div>

        <div class="col-md-12">
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection
