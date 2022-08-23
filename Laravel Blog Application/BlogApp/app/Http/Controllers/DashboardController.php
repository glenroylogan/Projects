<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

// The commented out code below was the original name that came in this class (DashboardController.php use to be named HomeController.php)
//class HomeController extends Controller
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // The commented out code below was the original name that came in this function 
        //return view('home');

        $user_id = auth()-> user()-> id;        
        $user = User::find($user_id);
        return view('dashboard') ->with('posts', $user->posts);
    }
}
