<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    function category(){
        return $this->belongsTo("App\Category", "category");                                                                                                  

    }

    function user(){
        return $this->belongsTo("App\User");                                                                                                  
    }

    function comments(){
        return $this->hasMany("App\Comments");
    }
}
