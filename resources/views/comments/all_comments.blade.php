@extends('layouts.app')

@section('content')
<style>
tr td {
    color:white;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card">
                <div class="card-header">{{ __('APPROVED COMMENTS') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Body</th>
                            <th>Date</th>
                            <th>View Post</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                        @php
                            $sn=0;
                        @endphp
                        @foreach($comments as $comment)
                        
                            @php 
                            if($comment->status == 0){continue;}
                                $editroute = route("comments.edit", $comment->id);
                                $deleteroute = route("comments.destroy", $comment->id);
                            @endphp
                            <tr id="{{$comment->id}}">
                            <td class="text-success">{{++$sn}}</td>
                            <td class="text-success">{{$comment->name}}</td>
                            <td class="text-success">{{$comment->body}} </td>
                            
                            <td class="text-success">{{$comment->created_at}}</td>
                            <td><a class="btn btn-primary" href="{{route('post.show', $comment->post_id)}}">View Posts</a></td>
                            <td> 
                                <button onclick="getRequest( '{{$editroute}}', event); setTimeout(()=>{window.location.reload()}, 500);" class="btn btn-warning">Approve</button> 
                                 <button onclick="deletePost('{{$deleteroute}}', '{{$comment->id}}', event); setTimeout(()=>{window.location.reload()}, 500);" class="btn btn-danger">Delete</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    

                  <style>
                      .w-5{display:none;}
                  </style>
                      <!-- Trigger the modal with a button -->

                </div>
            </div>



            <div class="card" style="margin-top: 20px;">
                <div class="card-header">{{ __('UNAPPROVED COMMENTS') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Body</th>
                            <th>Date</th>
                            <th>View Post</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                        @php
                            $sn=0;
                        @endphp                        
                        @foreach($comments as $comment2)
                        
                            @php 
                                if($comment2->status == 1){continue;}
                                $deleteroute = route("comments.destroy", $comment2->id);
                                $editroute = route("comments.edit", $comment2->id);
                            @endphp
                            <tr id="{{$comment2->id}}">
                                <td class="text-danger">{{++$sn}}</td>
                                <td class="text-danger">{{$comment2->name}}</td>
                                <td class="text-danger">{{$comment2->body}} </td>
                                
                                <td class="text-danger">{{$comment2->created_at}}</td>
                                <td><a class="btn btn-primary" href="{{route('post.show', $comment2->post_id)}}">View Posts</a></td>
                                <td> 
                                <button onclick="getRequest( '{{$editroute}}', event); setTimeout(()=>{window.location.reload()}, 500);" class="btn btn-success">Approve</button> 
                                <button onclick="deletePost('{{$deleteroute}}', '{{$comment->id}}', event); setTimeout(()=>{window.location.reload()}, 500);" class="btn btn-danger">Delete</button> 
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    

                  <style>
                      .w-5{display:none;}
                  </style>
                      <!-- Trigger the modal with a button -->

                </div>
            </div>



        </div>
    </div>
</div>
@endsection
