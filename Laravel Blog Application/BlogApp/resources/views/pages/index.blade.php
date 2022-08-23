

@extends('layouts.app')
@section('content')        
    <div class="jumbotron text-center">
        <!--Title Heading Received From The PagesController.php File (Location: app > http > controllers) -->
        <h1> {{$title}} </h1>              
        <p style="font-size:1.25vw"> This Is A CRUD, Access Control And User Authentication Application For A Website Blog Using Laravel Framework Version 8.83.9 </p>       
    </div>
@endsection 

<!--Background Style For The Home Page-->
<style>
    body {
         background-image: url("https://cdn.wallpapersafari.com/18/14/C49jhd.jpg");
         background-size: 100% 100%;
     }           
</style>

