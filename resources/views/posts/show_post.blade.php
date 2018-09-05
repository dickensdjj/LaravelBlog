@extends('layouts.dashboard_sidebar')

@section('dashboard-content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$post->title}}</h4>
                <hr class="my-4">
                <div class="card-text">
                        {!! $post->content !!}
                </div>
                <small>Category: {{$post->category}}, Tag: {{$post->category}}</small>
                <br>
                <br>
                 
            </div>
        </div>
    </div>
@endsection