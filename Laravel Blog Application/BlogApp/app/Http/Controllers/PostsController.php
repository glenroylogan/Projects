<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Post;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show'] ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // The code below shows all posts (all posts are organized in ascending order by default )

        /*
        $posts = Post::all();
        return view('posts.index')->with('posts',$posts); 
        */

        // The code below shows the result of if you were looking for a specific title with a specific description such as "Post Two" 
        /*
        $posts = Post::where('title','Post Two') ->get();
        return view('posts.index')->with('posts',$posts); 
        */
        //return Post::where('title','Post Two') ->get();
       

        /*
        The code below is for when a dont want to use ELOQUENT (This is basically Laravel's way of interacting with a database using relations such as ->)
        (see link here to learn more: https://laravel.com/docs/9.x/eloquent) 
        but want to use an SQL Query instead, then you can import the "use DB" untility (as seen at the top of this php file)
        */
        //$posts = DB::select('SELECT * FROM posts'); 
        //return view('posts.index')->with('posts',$posts); 

        // The code below is for when you want to limit your posts (the take keyword is what does the limitation limiting the posts from 2 to now 1)
        //$posts = Post::orderBy('created_at','desc') -> take(1)->get();
        //return view('posts.index')->with('posts',$posts);  


        /*
        The code below displays the title of the post being organized based on the submission date as well as in descending order 
        hence why we see "created_at" (this is a field in our database) and "desc" parameters 
        */

        /*        
        $posts = Post::orderBy('created_at','desc') ->get();
        return view('posts.index')->with('posts',$posts);    
        */ 
        
        /*The code below displays the post being organized based on the submission date as well as in descending order 
        hence why we see "created_at" (this is a field in our database) and "desc" parameters
        as well as using pagination 
        (This is a feature from laravel in which we can set a certain number of posts before we can turn to another page)
        right now paginate is set to 10 so when we have 11 posts in our system then option to go to a new page will be available 
           
        */       
        $posts = Post::orderBy('created_at','desc') ->paginate(10);
        return view('posts.index')->with('posts',$posts);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //The max:1999 represents 2MB
        $this->validate($request,['title'=>'required','body'=>'required', 'cover_image' => 'image|nullable|max:1999']);
        
        // Handle File Upload 
        if($request->hasFile('cover_image')){
            // Get file name with the extension 
            $fileNameWithExt = $request -> file('cover_image') -> getClientOriginalName(); 

            // Get just file name 
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            // Get just extension 
            $extension = $request -> file('cover_image') -> getClientOriginalExtension();

            // Filename to store (The 'time()' method is used to help differenciate between someone who may upload a file of the same name and extension)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        } else{
            // This is responsible for providing a default image if the user does not upload a cover image 
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post 
        $post = new Post; 
        $post -> title =$request -> input('title');
        $post -> body =$request -> input('body');
        $post -> user_id = auth() -> user() -> id; 
        $post -> cover_image = $fileNameToStore; 
        $post -> save(); 

        return redirect('/posts') -> with('success','Post Created');
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
        return view('posts.show')-> with('post', $post);         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        // Check for correct user 
        if( auth()->user()->id !== $post->user_id){
            return redirect('/posts')-> with('error', 'Unauthorized Page'); 
        }

        return view('posts.edit')-> with('post', $post); 
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
          //
          $this->validate($request,['title'=>'required','body'=>'required']);

            // Handle File Upload 
            if($request->hasFile('cover_image')){
                // Get file name with the extension 
                $fileNameWithExt = $request -> file('cover_image') -> getClientOriginalName(); 

                // Get just file name 
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

                // Get just extension 
                $extension = $request -> file('cover_image') -> getClientOriginalExtension();

                // Filename to store (The 'time()' method is used to help differenciate between someone who may upload a file of the same name and extension)
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;

                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


            } 
       
          // Create Post 
          $post = Post::find($id); 
          $post -> title =$request -> input('title');
          $post -> body =$request -> input('body');

          if($request->hasFile('cover_image')){
                $post->cover_image = $fileNameToStore;
          }

          $post -> save(); 
  
          return redirect('/posts') -> with('success','Post Updated');
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

        // Check for correct user 
        if( auth()->user()->id !== $post->user_id){
            return redirect('/posts')-> with('error', 'Unauthorized Page'); 
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image thats was sent to the "public/cover_images" folder 
            Storage::delete('public/cover_images/'.$post->cover_image );
        }

        $post->delete();
        return redirect('/posts') -> with('success','Post Removed');
    }
}
