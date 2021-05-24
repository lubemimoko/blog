<?php

namespace App\Http\Controllers;
use App\User;

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
}
