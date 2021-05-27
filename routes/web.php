<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\CategoryController;
// use ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('index');
Route::view('/login',"auth.login")->name('login');
Route::view('/register', "auth.register")->name('register');

Auth::routes();

// Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/singlepost/{post}', [ App\Http\Controllers\PostController::class,'show'])->name('userpost.show');

Route::group(["middleware"=>"auth"], function(){

    Route::view('/home', "home")->name('home');
    Route::Resource('/category', CategoryController::class)->only(["index", "create", "store", "update", "destroy"]);
    Route::Resource('/comments', CommentsController::class)->only(["index", "create", "store", "show", "destroy", "edit"]);
    Route::Resource('/post', PostController::class);
    
    
    Route::group(["middleware"=>"admin"], function(){
        Route::get('/allusers', [UserController::class, 'users'])->name("allusers");
        Route::get('/userpost/{id}', [UserController::class, 'userpost'])->name("userpost");
        Route::delete('/userdelete/{id}', [UserController::class, 'deleteuser'])->name("userdelete");
        
    });
});
