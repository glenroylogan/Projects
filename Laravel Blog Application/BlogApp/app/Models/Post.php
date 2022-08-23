<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use HasFactory;

    //Table Name
    protected $table = 'posts';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps 
    public $timeStamps = true; 

    public function user(){
        // Might be the commented out code below not sure yet 
        //return $this -> belongsTo('App\User');
        return $this -> belongsTo('App\Models\User'); 
    }
    
}
