@extends('layouts.dashboard_sidebar')
@section('dashboard-content')

{{-- tinyMCE --}}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKeys1dq0fvqz1zwjsy4vcaqbdhy5aqgql009zkeivov30y6j2xc"></script>

<div id="create_post" class="p-2">
    <h2 class="text-center">Create A New Post</h2>
    <hr class="my-4">
    @include('errors.error')
    {{-- WTF is csrf token --}}
    <form method="post" action="{{action('PostsController@store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="blog-title">Title:</label>
            <input type="text" class="form-control" id="blog-title" name="blog-title">
        </div>
        <div class="form-group">
                <label for="blog-title">Category:</label>
                <input type="text" class="form-control" id="blog-category" name="blog-category">
        </div>
        <div class="form-group">
                <label for="blog-title">Tags: </label>
                <input type="text" class="form-control" id="blog-tags" name="blog-tags">
        </div>
        <div class="form-group">
            <label for="blog-content">Content:</label>
            <script>tinymce.init({ selector:'textarea',
            branding: false, 
            plugins: "link image code", 
            menubar: false,
            
            });</script>
            <textarea class="form-control" name="blog-content" id="blog-content" rows="15"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>  
</div>
    
@endsection
