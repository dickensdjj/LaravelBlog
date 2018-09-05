<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }

        $user_id = auth()->user()->id;
        $posts = User::find($user_id) -> posts;
        return view('posts.view_posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }

        return view('posts.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }

        $this -> validate($request,[
            'blog-title' => 'required',
            'blog-content' => 'required',
            'blog-category' => 'required'
        ]);


        //create post
        $post = new Post;
        $post -> title = $request -> input('blog-title');
        $post -> content = $request -> input('blog-content');
        $post -> category = $request -> input('blog-category');
        $post -> tag = $request -> input('blog-tags');
        $post -> user_id = auth() -> user() -> id;
        $post -> save();

        return redirect('/dashboard/post/create')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }

        $post = Post::find($id);
        return view('posts.show_post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }
        $post = Post::find($id);
        return view('posts.edit_post') -> with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }
        $this -> validate($request,[
            'blog-title' => 'required',
            'blog-content' => 'required',
            'blog-category' => 'required'
        ]);


        //create post
        $post = Post::find($id);
        $post -> title = $request -> input('blog-title');
        $post -> content = $request -> input('blog-content');
        $post -> category = $request -> input('blog-category');
        $post -> tag = $request -> input('blog-tags');
        $post -> save();

        return redirect('/dashboard/posts/view')->with('success', 'Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(auth()->user() == null){
            return redirect('/login');
        }
        $post = Post::find($id);
        $post -> delete();
        return redirect('/dashboard/posts/view')->with('success', 'Post Deleted');
    }
}
