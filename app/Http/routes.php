<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome',['as' => 'welcome', function () {
    return view('welcome');
}]);
Route::get('xuatbang', function () {
    $users = DB::table('users')->get();
    return view('xuatbang', ['users' => $users]);
});
Route::get('/gallery', function () {
    return view('gallery');
});

//kiem tra admin khi dang bai
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('admin/posts','PostsController');
    Route::resource('admin/users','UserController');
    Route::get('admin/gallery','ImageController@index');
    Route::any('upload', 'ImageController@upload');
    Route::any('delete', 'ImageController@delete');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'IndexController@index');
Route::get('/contact', function () {
    return view ('contact');
});
Route::get('/about', function () {
    return view ('about');
});
Route::get('/post/{id}', 'IndexController@show');
Route::get('/search', 'IndexController@search');




