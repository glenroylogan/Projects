<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1> Hello World Glenroy Logan </h1>'; 
});

//Below is an example of how we can use variables in our hyperlink route and it returns a result in our browser 
//Example: http://localhost:8080/lsapp/public/users/Glenroy/1997 

Route::get('/users/{name}/{id}', function($name,$id) {   
    return 'This is user '.$name. ' With an ID of '.$id;   
});
*/ 

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/about', function () {
    //"pages/about" is the same as "pages.about"
    //return view('pages/about'); 
    return view('pages.about');    
});
*/ 

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Route::resource('posts', App\Http\Controllers\PostsController::class);
Auth::routes();

//The commented out code is to be reviewed if it does not work 
//Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
