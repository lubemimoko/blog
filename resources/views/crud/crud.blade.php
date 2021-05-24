@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <form method="post" enctype="multipart/form-data">
                    @csrf
                        <table>
                        <tr> 
                                <td><input type="text" placeholder="name" name="name"> </td>
                            </tr>

                            <tr> 
                                <td><input type="file" placeholder="name" name="name"> </td>
                            </tr>

                            <tr> 
                                <td><input type="submit"  name="submit" > </td>
                            </tr>
                        </table>
                    </form>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
