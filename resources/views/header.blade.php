<!DOCTYPE html>
<html>
<head>
    <!-- OG -->
	<meta property="og:title" content="Blog with Laravel : Blog Page" />
	<meta property="og:description" content="Multi-User Laravel Blog" />
	<meta property="og:image" content="" />
	
	
	<!-- FAVICONS ICON ============================================= -->
	<!-- <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
  
  <title>BLOG</title>
  
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{asset('CSS/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('CSS/style.css')}}">
  <link rel="stylesheet" href="{{asset('CSS/pstyle.css')}}">
  
   <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('vendor/css/clean-blog.min.css')}}" rel="stylesheet">
    <!-- Iconic Fonts -->
    <link rel="stylesheet" href="{{asset('CSS/icofonts.css')}}" />

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        
        .fixed-top {
            position: fixed !important;
            }

        .sticky-top {
            position: -webkit-sticky;
            position: sticky !important;
            top: 0;
            z-index: 1020;
        }
        #mainNaav{
        background-color: rgba(255, 255, 255, 1);
        }

        ul li .nav-link{
        color:blue !important;
        padding-right:35px !important;
        }
        

       header.masthead{
            position:absolute !important;
            top:0px !important;
            left:0px;
            right:0px;
            color: white !important;
            height:400px;
            background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('newslide/960x0.jpg')
        }


        .post-div{
        margin: 1%;
        box-shadow: 2px 2px 7px gray;
        padding: 0px;
        }

        .post-image, .post-image a img{
        width: 100%;
        height: 300px;
        padding: 0px;
        border-bottom:1px solid gray;
        }

        .post-body{
        padding: 5px 15px;
        height: 200px;;
        }

        .post-div .caption{
        position: absolute;
        top:240px;
        font-weight: bold;
        color:white !important;
        background-color: rgba(0,0,0, 0.7);
        z-index: 100px;
        }

        .see-more{
        position: relative;
        right:0px;
        background-color:#007bff;
        }

        @media only screen and (min-width: 768px) {
          .post-div, .col-md-3{
            margin: 1%;
            flex: 0 0 31%;
            max-width: 31%;
          }
        }        
    </style>
    <style>
        .navbar-nav .nav-item .nav-link{
            padding-right: 40px;
        }
    </style>
    </head>

    <body>
     
<!--       popup modal class-->
        
        
        
<!--     robot   end of popup-->
     <!-- Navigation   navbar-light -->
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog Page') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @auth
                    @php if(Auth::user()->role=="admin"){
                    @endphp
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.create') }}">{{ __('Category') }}</a>
                    </li>
                    @php } @endphp 
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">{{ __('All Category') }}</a>
                    </li>
                    
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.create') }}">{{ __('Post') }}</a>
                    </li>

                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.index') }}">{{ __('All Posts') }}</a>
                    </li>
                    @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#">
                                    Welcome {{  Auth::user()->name }}
                                </a>
                          </li>
                          <li class="nav-item">
                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <!-- </div> -->
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

   
  <!-- Page Header -->
  
  <header class="masthead">
    <!-- <div class="overlay"></div> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="post-heading"  style="margin:0px;padding:200px 0 100 0;">
            <h1 style="font-size:48px !important; text-align:center; color:white;">
                Blog With Laravel 
            </h1>
            <h2 class="subheading" style="padding-left:100px; text-align:center; color:white;">Sign up For Free and Upload Your Post</h2>
            
          </div>
        </div>
      </div>
    </div>
  </header>
<div style="margin-bottom:330px"></div>
  