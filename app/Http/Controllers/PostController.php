<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use File;
use Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       if(Auth::user()->role==="admin"){
        $posts = Post::paginate(6);
        }else{
            $posts = Post::where("user_id", Auth::user()->id)->paginate(6);
        } 
        
        $categories = Category::all();
        return view("post/all_post", compact("posts", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all();
        return view("post/post", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ["title"=>"required", 
        "body"=>"required", 
        "file"=>"required|image|max:2048", 
        "category"=>"required"]);

        if($request->file('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(300, 300);
            $folder = 'images/'.time();
            File::makeDirectory($folder, 0775, true, true);
            $image_resize->save(public_path($folder."/".$name));
        }
        
        $post = new Post;
        $user_id = Auth::user()->id;


        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;
        $post->pic = 'images/'.$name;
        $post->user_id = $user_id;
        $post->save();

        return response()->json($post);
    }

    public function show (Post $post){
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        if($post->user_id !=Auth::user()->id && Auth::user()->role!="admin"){
            return response()->json(["message"=>"Not authorised to perform this action!"], 403);
        }
        $this->validate($request, [
            "title"=>"required",
        "body"=>"required", 
        "file"=>"image|max:2048", 
        "category"=>"required"]);

        if($request->file('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(300, 300);
            $folder = 'images/'.time();
            File::makeDirectory($folder, 0775, true, true);
            $image_resize->save(public_path($folder."/".$name));
            // remove old pic
            if(file_exists($post->pic)){
                $imgarray = explode("/", $post->pic);
                $oldimg = $imgarray[0]."/".$imgarray[1];
                File::deleteDirectory($oldimg);
            }
            $post->pic = $folder.'/'.$name;
        }
        

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;
        $post->save();
        $post->userName = $post->user->name;
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(file_exists( $post->pic)){
            $imgarray = explode("/", $post->pic);
            $oldimg = $imgarray[0]."/".$imgarray[1];
            File::deleteDirectory($oldimg);
        }
       
        $post->delete();

        return response()->json($post);
    }
}
