
@extends('layouts.app')

@section('content')
    <!--<h1> Services </h1>-->
    <h1> {{$title}} </h1>
    <p> This Is The Services Page With The List Of Services That We Provide</p>    

    @if(count($services) > 0)
        <ul class="list-group">
            @foreach ($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif     
@endsection 

<style>
    body {
         background-image: url("https://cdn.wallpapersafari.com/18/14/C49jhd.jpg");
         background-size: 100% 100%;
     }           
</style>