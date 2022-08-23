

@extends('layouts.app')
@section('content')    
    <!--<h1> About</h1>-->  
    <a href = {{asset('posts')}} class = "btn btn-info"> Go Back</a>  
    <h3> {{$post->title}} </h3>  
    <img style="width: 50%" src ="{{asset("storage/cover_images/$post->cover_image")}}">   
    <br><br>  
    <div>
        {!!$post->body!!}
    </div>  
    <hr><small>Written on {{$post->created_at}} by {{$post->user->name}}</small>      
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id) 
            <a class="btn btn-info" href="{{$post->id}}/edit">Edit</a>      
            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id, 'method' => 'POST', 'class' => 'float-right']])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection 