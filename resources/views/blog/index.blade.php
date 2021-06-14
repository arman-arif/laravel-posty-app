@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>

    @foreach($posts as $key => $post)
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p>
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary"> {{ $tag->name }} </span>
                @endforeach
            </p>
            <p>{{ $post->content }}</p>
            <p><a href="{{ route('blog.post', ['id' => $post->id]) }}">Read more...</a></p>
            <small class="text-white-50">{{ $post->created_at->format('M d, Y') }}</small>
        </div>
    </div>
    <hr>
    @endforeach

    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
