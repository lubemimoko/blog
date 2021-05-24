@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Users') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                    <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Joined</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                        @foreach($users as $user)
                            @php 
                                $deleteroute = route("userdelete", $user->id);
                            @endphp
                            <tr id="{{$user->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}} </td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                                 <button onclick="deletePost('{{$deleteroute}}', '{{$user->id}}', event)" class="btn btn-danger">Delete</button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    

                  <div>
                      {{$users->links()}}
                  </div>

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
