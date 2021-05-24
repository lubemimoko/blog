@include("header")
 <article>
    <div class="container-fluid">
      <div class="row">
    @foreach($posts as $post)
          <div class="post-div col-md-3"  style="margin-top:20px; border-radius:50px;">
            <div class="post-image">
              <a href="{{route('userpost.show', $post->id)}}">
                <img class="img-fluidd" src="{{$post->pic}}" alt="">
              </a>
           </div>
            <span class="caption text-muted w-100">{{$post->title}} <br> Date of release:{{$post->created_at}} </span>
            <div class="post-body" style="overflow:none">
               <p>
               @php
               $body = $post->body;
                     if(strlen($post->body)>80){$body=substr($post->body,0,80)."...";}
              @endphp
                    {{$body}}
               </p>
               <a href="{{route('userpost.show', $post->id)}}" style="float:right">
                  <div class="btn btn-primary see-more">See More</div>
               </a>
            </div>

          </div>
        @endforeach

        </div>
      </div>
    </article>


        <!--    footer starts-->
       
       @include("footer")
       