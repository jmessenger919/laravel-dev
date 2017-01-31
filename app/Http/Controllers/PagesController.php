<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {
    
    public function getIndex() {
        $posts = Post::orderBy('id', 'desc')->take(5)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    
    public function getAbout() {
        $first = 'Jesse';
        $last = 'Messenger';
        $fullname = $first . " " . $last;
        $email = 'jmessenger919@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);
    }
    
    public function getContact() {
        return view('pages.contact');
    }
    
    public function postContact () {
        
    }
    
}