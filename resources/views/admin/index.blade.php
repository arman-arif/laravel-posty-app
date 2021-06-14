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
            <table class="table table-hover" style="width:100%">
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <strong>{{ $post->title }}</strong> - {{ $post->updated_at->diffForHumans() }}
                        </td>
                        <td>
                            <a class="pr-2" href="{{ route('admin.edit', $post->id) }}">Edit</a>
                            <a href="{{ route('admin.delete', ['id'=>$post->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
