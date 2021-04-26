@extends('layouts.admin')

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
            <p><strong>Learning Laravel</strong> <a href="{{ route('admin.edit',1) }}">Edit</a></p>
        </div>
    </div>
@endsection