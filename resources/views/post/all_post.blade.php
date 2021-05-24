@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                    <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Pic</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>User</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                        @foreach($posts as $post)
                        @php 
                        $updateroute = route("post.update", $post->id);
                        $deleteroute = route("post.destroy", $post->id);
                        @endphp
                            <tr id="{{$post->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td><img id="pic{{$post->id}}" src="{{$post->pic}}" height="50px" width="50pX"></td>
                            <td id="title{{$post->id}}">{{$post->title}}</td>
                            <td id="body{{$post->id}}">{{$post->body}} </td>
                            <td>{{$post->user->name}}</td>
                            <td> <button id="mod{{$post->id}}" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="editPost({{$post}}, '{{$updateroute}}')">Edit</button> 
                                 <button onclick="deletePost('{{$deleteroute}}', '{{$post->id}}', event)" class="btn btn-danger">Delete</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    

                  <div>
                      {{$posts->links()}}
                  </div>

                  <style>
                      .w-5{display:none;}
                  </style>
                      <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">EDIT RECORD</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body">
          
                    <form method="post" onsubmit='updateForm(event)' id="categoryForm2">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="_method" value="Patch">
                        <input type="hidden" name="route" id="route">
                        <div class="col-md-12">
                            <img id="pic" style="max-width:80%; height:100px; margin-left:9%;" alt="Image">      
                                
                        </div>
                        <div class="col-md-12">
                                <!-- <label for="title" class="text-md-left">{{ __('Title') }}</label>            -->
                                <input id="title" type="text" class="form-control" placeholder="Title" name="title" value="" required autofocus>
                                <!-- <input type="hidden" id="id"> -->
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         <!-- </div> -->

                            <div class="col-md-12">
                                <select name="category" id="category" class="form-control">
                                    <option>Select Category</option>
                                    @foreach($categories as $categor)
                                    <option id="cat{{$categor->id}}" value="{{$categor->id}}">{{$categor->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <textarea id="body" class="form-control" name="body"  required placeholder="Body"></textarea>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            
                            <div class="col-md-12">
                                <input id="imgselect" type="file" class="form-control" onchange="previewImage(this)"  name="file">
                                <img id="preview" style="max-width:130px; margin-top:20px; display:none" alt="Image Preview">      
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                    </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
