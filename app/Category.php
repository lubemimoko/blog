<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';

    function post(){
        return $this->hasMany("App\Category");                                                                                                  

    }
}
