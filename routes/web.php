<?php

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

Route::get('/', function () {
    flash()->success('Hey There! Welcome to Basix for Laravel 5.4');
    return view('welcome');
});

Route::get('/posts',function(){
   return view('posts');
});

Route::get('/{slug}',function($slug){
   $post = \App\Post::findBySlugOrFail($slug);
    return view('post')->with('post',$post);
});