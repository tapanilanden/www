<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        
        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        
        $this->validate($request, array(
            'title' =>'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required' 
            )); 
        
        // store in the database
        
        $post = new Post;
        
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        
        $post->save();
        
        // redirect to another page
        
        Session::flash('success','The blog post was successfully saved!');
        
        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit')->withPost($post);
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
        //validate
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' =>'required|max:256',
                'slug' => 'required|alpha_dash|min:5|max:256',
                'body'  => 'required'
            )); 
        }
        else {
            $this->validate($request, array(
                'title' =>'required|max:256',
                'slug' => 'required|alpha_dash|min:5|max:256|unique:posts,slug',
                'body'  => 'required'
            )); 
        }
        
        //save
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        
        $post->save();
        
        //set flash data with success message
        Session::flash('success','The blog post was successfully saved!');
        
        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();
        
        Session::flash('success', 'The post was successfully deleted!');
        
        return redirect()->route('posts.index');
        
    }
}
