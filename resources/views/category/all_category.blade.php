@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                    <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Category</th>
                            @if(Auth::user()->role=="admin")
                                <th>Action</th>
                            @endif
                            </tr>
                        </thead>

                        <tbody id="tbody">
                        @foreach($category as $cat)
                            <tr id="{{$cat->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td id="cat{{$cat->id}}">{{$cat->name}}</td>

                            @if(Auth::user()->role=="admin")
                            
                                @php
                                    $route = route('category.update',$cat->id);
                                    $delete = route('category.destroy',$cat->id);
                                    
                                @endphp

                                <td> <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="editCat({{$cat}}, '{{$route}}')">Edit</button> 
                                    <button onclick="deleteCat('{{$cat->id}}', '{{$delete}}')" class="btn btn-danger">Delete</button> </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>    

                  <div>
                      {{$category->links()}}
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
          
                    <form method="patch" onsubmit='updateForm(event)' id="categoryForm2">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <input type="hidden" id="route" value="{{ route('category.index') }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="Bags" required autofocus>
                                <input type="hidden" id="id">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
