<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        //return 'INDEX';
        $title = 'Welcome To My Blog APP!';

        /*The Next 2 Lines of code below do the same exact thing */

        //return view('pages.index', compact('title') );
        return view('pages.index') -> with('title', $title);
    }

    public function about(){     
        $title = 'About Us';  
        return view('pages.about') -> with('title', $title);
    }

    public function services(){  
        //$title = 'Our Services';        
        //return view('pages.services') -> with('title', $title);

        $data = array(
            'title' => 'Services', 
            'services' => ['News Letters','Web Push Notifications','Selling Online Products','Search Engine Optimization']    
        );
        return view('pages.services') -> with($data);
    }
}
