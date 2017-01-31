<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(5);
        
        return view('blog.index')->withPosts($posts);
    }
    
    public function getSingle($slug) {
        // Fetch from Database based on Slug
        $post = Post::where('slug', '=', $slug)->first();
        
        // Return the View and pass in Post Object
        return view('blog.single')->withPost($post);
    }
}