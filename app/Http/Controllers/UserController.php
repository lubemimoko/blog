<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        $users = User::where("role", "user")->paginate(10);
        return view("user.all_users", compact("users"));
    }

    public function deleteuser($id){
        
       $user = User::find($id)->delete();
        return response()->json($user);
    }

    public function userpost($user_id)
    { 
        $posts = Post::where("user_id", $user_id)->paginate(6);
        $categories = Category::all();
        return view("post/all_post", compact("posts", "categories"));
    }

}
