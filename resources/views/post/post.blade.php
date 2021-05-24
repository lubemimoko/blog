@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

                <div class="card-body">
                    <form method="post" onsubmit='insertPost(event)' id="postForm">
                        @csrf
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" id="route" value="{{ route('post.store') }}">
                        <!-- <div class="form-group row"> -->
            
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
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <input id="imgselect" type="file" class="form-control" onchange="previewImage(this)"  name="file" required>
                                <img id="preview" style="max-width:130px; margin-top:20px; display:none" alt="Image Preview">      
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
