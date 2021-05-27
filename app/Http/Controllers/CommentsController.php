<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::paginate(20);
        return view("all_comments", compact("comments"));  
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $this->validate($request, [
            "name"=>"required|min:2",
            "body" => "required",
            "post_id" => "required",
        ]);

        $comment = new Comments();
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->save();    

        $comment->comment="yes";
            return response()->json($comment);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */

    public function show($post_id)
    {
        
        if(Auth::user()->role==="admin"){
            $comments = Comments::where("post_id", $post_id)->orderBy("status", "asc")->get();
        }else{
            $comments = Comments::where("post_id", $post_id)->where("user_id", Auth::user()->id)->orderBy("status", "asc")->get();
        } 
        return view("comments.all_comments", compact("comments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comments::find($id); 
        $comments->status = $comments->status ? 0 :1;
        $comments->save();
        return response()->json($comments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comments::find($id);
        $comments->delete();
        return response()->json(["message"=>"successful"]);
    }
}
