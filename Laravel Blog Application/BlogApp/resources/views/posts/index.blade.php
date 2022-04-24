
@extends('layouts.app')
@section('content')        
    <h3> Posts </h3>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card p-3 mt-3 mb-3">
                <div class='row'>
                    <div class="col-md-4 col-sm-4" >
                        <img style="width: 100%" src ="{{asset("storage/cover_images/$post->cover_image")}}">
                    </div>
                    <div class="col-md-8 col-sm-8" >
                        <h3> <a href="{{route('posts.show', $post->id)}}"> {{$post->title}}</a> </h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
                
            </div>
        @endforeach   
        {{$posts->links("pagination::bootstrap-4")}}     
    @else 
        <p> No Posts Found </p>
    @endif    
@endsection 

<style>
    body {
         background-image: url("https://cdn.wallpapersafari.com/18/14/C49jhd.jpg");
         background-size: 100% 100%;
     }           
</style>
