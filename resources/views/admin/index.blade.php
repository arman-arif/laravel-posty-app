@extends('layouts.master', ['title' => 'Admin Index'])

@section('content')
    <div class="row">
        @if(Session::has('info'))
            <div class="col-md-8 col-md-offset-2">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        @endif
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
                <p>
                    <strong>{{ $post->title }}</strong>
                    <a href="{{ route('admin.edit', $post->id) }}">Edit</a>
                    <a href="{{ route('admin.delete', ['id'=>$post->id]) }}">Delete</a>
                </p>
            @endforeach
        </div>
    </div>
@endsection
