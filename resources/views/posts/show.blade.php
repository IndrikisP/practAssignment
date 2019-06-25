@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-mrg btn-info">{{__('translations.back')}}</a>
<h1>{{$post->title}}</h1>
<small>{{__('translations.written_on')}} {{$post->created_at}} {{__('translations.by')}} {{$post->user->name}}</small>
<hr>
<div>
       {!!$post->body!!}
       <!-- we need to use exclamation marks because
        if we just use double curly brackets, then
         the html won't be parsed-->
</div>
<hr>

<br>
@if(!Auth::guest())
<?php 
  $auth_user_id = Auth::user()->id;
?>
  {!! Form::open(['action'=>'LikesController@store', 'method' => 'POST']) !!}
  {{ Form::hidden('post_id', $post->id) }}
  {{ Form::hidden('user_id', $auth_user_id) }}
  <p>{{ Form::submit('Like',['class'=>'btn btn-mrg btn-primary']) }}</p>
  {!! Form::close() !!}
    @if(Auth::user()->id == $post->user_id)
      <a href="/posts/{{$post->id}}/edit" class="btn btn-edit btn-block">Edit Post</a>

{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE'])!!}
    {{Form::submit('Delete Post',['class' =>'btn btn-del btn-block'])}}
{!!Form::close()!!}
    @endif
@endif


@if (Auth::check())
<h4>{{__('translations.add_comment')}}</h4>
  {{ Form::open(['action'=>'CommentsController@store', 'method' => 'POST']) }}
  <p>{{ Form::textarea('body', old('body')) }}</p>
  {{ Form::hidden('post_id', $post->id) }}
  <p>{{ Form::submit('Send',['class'=>'btn btn-mrg btn-primary']) }}</p>
{{ Form::close() }}
@endif
<h3>{{__('translations.comments')}}</h3>
<!-- forelse is just foreach with extra handling for empty inputs -->
@forelse ($post->comments as $comment)
  <small>{{ $comment->user->name }} {{$comment->created_at}}</small>
  <div class="commentClass">
  <p>{{ $comment->body }}</p>
  </div>
  <hr>
@empty
  <p>{{__('translations.no_comments')}}</p>
@endforelse
@endsection