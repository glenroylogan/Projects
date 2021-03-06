

@extends('layouts.app')
@section('content')        
    <h3> Create Post  </h3>    
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}   
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title']) }}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id' => 'editor','class' => 'form-control','placeholder' => 'Body Text']) }}
        </div>
        <div class ='form-group'>
            {{{Form::file('cover_image')}}}
        </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}      
@endsection 

<style>
    body {
         background-image: url("https://wallpapercave.com/wp/wp2646223.png");
         background-size: 100% 100%;
     }           
</style>
