@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <br>
                    <a href="/posts/create" class="btn btn-primary">Create a Post</a>
                    @if(count($posts)>0)
                    <h2> Your blog posts</h2>
                            @foreach($posts as $post)
                            <hr>
                                <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                            
                            <br>
                                {!!$post->body!!}
                            @endforeach
                       
                        @else 
                        <p>No posts yet</p>

                        @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
