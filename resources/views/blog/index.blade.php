@extends('main')

@section('title','| Blog')

@section('content')
    
    <div class="row">
        <div class="col-md-12"> 
        <h1>BLÖGI</h1>
        </div>
    </div>
    
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <h1>{{ $post->title }}</h1>
            <h5>Published: {{ date('j.m.Y:', strtotime($post->created_at)) }}</h5>
                
            <p>{{ substr($post->body, 0, 250) }} {{ strlen($post->body) > 250 ? "..." : "" }}</p>
            
            <a href="{{ route('blog.single'), $post->id }}">Lue lissee</a>
        </div>
    </div>
    @endforeach
    
@endsection