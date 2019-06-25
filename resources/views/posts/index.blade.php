@extends('layouts.app')

@section('content')
<h1>{{__('translations.Posts')}}</h1>
<!--<button>Sort</button>-->
    @if(count($posts)>0)
        @foreach($posts as $post)
                    <small>{{__('translations.written_on')}} {{$post->created_at}} {{__('translations.by')}} {{$post->user->name}}</small>
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