@extends('layouts.dashboard_sidebar')

@section('dashboard-content')
<div id="view_post">
    <h2>My Post</h2>
    <hr class="my-4">
    
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="container-fluid m-1">
                <div class="card p-2">
                    <div class="card-body">
                    <a href="/dashboard/post/view/{{$post->id}}" class="card-title">{{$post->title}}</a>
                        <p class="card-text">{!!$post->content!!}</p>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
                        <br>
                        <small>Category: {{$post->category}}; Tag: {{$post->tag}}</small>
                    </div>
                    <div class="card-body">
                    <a href="/dashboard/post/view/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                        <span> / </span>
                    <form class="d-inline" method="post" action="{{action('PostsController@destroy',['id' => $post->id])}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{ method_field('DELETE') }}
                        <input id="delete_post" type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>no post found</p>
    @endif
</div>

@endsection

