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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/imageResize',function(){
    $img = Image::make(public_path('images/charminar.jpg'))->fit(400, 200,null,"top");
    return $img->response('jpg');
});

Route::get('imageManipulation',function(){
   return view('images');
});

Route::get('/{slug}', function ($slug) {
    $post = \App\Post::findBySlugOrFail($slug);
    return view('post')->with('post', $post);
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});