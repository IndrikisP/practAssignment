@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-info">Back</a>
<h1>{{$post->title}}</h1>
<div>
       {!!$post->body!!}
       <!-- we need to use exclamation marks because
        if we just use double curly brackets, then
         the html won't be parsed-->
</div>
<hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<br>
@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-info btn-block">Edit Post</a>

{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE'])!!}
    {{Form::submit('Delete Post',['class' =>'btn btn-danger btn-block'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection