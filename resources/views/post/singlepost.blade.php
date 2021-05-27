
        @include("header")

        <div class="container">
            <div class="title">WELCOME<br> TO BLOG WITH LARAVEL</div>
        
           <br>
           <br>
           <br>
           <br>
        <div class="row">
            <div class="col-sm-1">
             
            </div>
            <div class="col-sm-10 col-sm-1">
                
                <div class="thumbnail" style="padding:10px; box-shadow:1px 1px 14px 0px; width:auto !important;">
                    <img src="{{asset($post->pic)}}" style="object-fit: cover; width:100%;">
                </div>
                <div style="font-size:40px;color:yellowgreen;">Title:{{$post->title}}</div>
                <div>Date of release:{{$post->created_at}}</div>
                <div>Category:{{$post->categoryName}}</div>
                <div>Post:{{$post->body}}
                </div>
      
            </div>
        </div>
            <br>
            <hr>
        
            <!-- <div>{{Session::get("message")}}</div> -->
<!--    comment-->
            <br>
            <br>
            <span style="color:darkblue">Share Your Thoughts About This Post</span>
            <hr>
            <span style="color:darkblue">Comment:</span>
            @foreach($post->comments as $comment)
                @php
                    if($comment->status == 0){continue;}
                @endphp
            <div class="comstyle">
                <img style="margin:10px" class="pull-left" src="images/users.png" width="7%">
                <p style="font-size:30px;font-weight:bold;text-transform: capitalize;color:darkblue">{{$comment->body}}</p>
                <p style="font-size:18px; color:#999999;text-transform: capitalize;font-weight:bold">{{$post->created_at}}</p>
                <p>{{$comment->name}}</p>
            </div>
            <br>
            <hr>
            @endforeach
            <hr style="background-color:darkblue">
              <div>
      <form id="postForm">
        @csrf
        <input type="hidden" id="route" value="{{route('comments.store')}}">
        <input type="hidden" name="post_id" readonly id="post_id" value="{{$post->id}}">
          <div class="form-group">
      <label for="name" style="color:darkblue">Name:</label>
      <input type="text" name="name" style="text-align:center" placeholder="enter name" class="form-control"  required>
            
    <div class="form-group">
      <label for="commentarea" style="color:darkblue">Comment:</label>
      <textarea name="body" class="form-control" style="text-align:center" id="comment area" required></textarea>
          </div>
      <input class="btn btn-info" onclick="insertPost(event)"  type="submit" name="submit" value="Comment">
          <br>   <br>   <br>
   
      </form>
      
    </div>
    
    </div>
    </div>
       
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('JS/jquery-3.4.1.min.js') }}" defer></script>
    <script src="{{ asset('JS/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('JS/sweetAlert.js') }}" defer></script>
    <script src="{{ asset('JS/myJs.js') }}" defer></script>

       @include("footer")
       