<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{
    // Authenticate if User is Logged In
    public function __construct() {
        // Access Middleware Authentication
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a Variable to represent all Posts, Display Posts Paginated & Sorted By Newest
        $posts = Post::orderby('id', 'desc')->paginate(5);
        
        // Return a View and pass in the above Variable
        return view('admin.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return a view
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));
        
        // Store in Database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;        
        $post->body = $request->body;
        $post->save();
        
        // Set Flash Data with Success Message
        Session::flash('success', 'This post was successfully created!');
        
        // Redirect to Page
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the Post in the Database and save as Variable
        $post = Post::find($id);
        
        // Return the View and pass in the above Variable
        return view('admin.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the Post in the Database and save as Variable
        $post = Post::find($id);
        
        // Return the View and pass in the above Variable
        return view('admin.posts.edit')->withPost($post);
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
        // Find the Post in the Database and save as Variable
        $post = Post::find($id);
        
        // Validate the Data
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        }
        
        else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        
         // Find the Post in the Database and save as Variable, then Store in Database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        
        // Set Flash Data with Success Message
        Session::flash('success', 'This post was successfully updated!');
        
        // Redirect with Flash Data to Posts.Show
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the Post in the Database and save as Variable
        $post = Post::find($id);
        
        // Delete Post
        $post->delete();
        
        // Set Flash Data with Success Message
        Session::flash('success', 'This post was successfully deleted!');
        
        // Redirect with Flash Data to Posts.Index
        return redirect()->route('admin.posts.index', $post->id);
    }
}