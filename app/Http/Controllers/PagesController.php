<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $testi = request->url();
        return view('pages.welcome')->withPosts($posts)->withTesti($testi);
    }
    
    public function getAbout() {
    
        $first = "Jee";
        $last = "Eee";
        
        $fullname = $first . " " . $last;
        $email = 'weeweewee@jeejeejee.ee';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);
    }
    
    public function getContact() {
        return view('pages.contact');
    }
    

}