@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                <div class="jumbotron">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            {!!$post->body!!}
                </div>
            <hr>
            
            
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts are found</p>
    @endif
@endsection