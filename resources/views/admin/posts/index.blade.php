@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(\Illuminate\Support\Facades\Session::has('deleted_post'))
        <p class="alert alert-warning">{{ session('deleted_post') }}</p>
    @endif

    @if(\Illuminate\Support\Facades\Session::has('created_post'))
        <p class="alert alert-success">{{ session('created_post') }}</p>
    @endif

    @if(\Illuminate\Support\Facades\Session::has('updated_post'))
        <p class="alert alert-success">{{ session('updated_post') }}</p>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Posted by</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{ $post->photo ? $post->photo->file : '/images/no_photo.jpg' }}" alt="{{ $post->photo ? $post->photo->file : 'No Photo' }}"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategorised' }}</td>
                    <td><a href="{{ route('posts.edit', $post->id) }}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop
