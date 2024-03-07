<?php

//use App\Http\Controllers\PostsController;
//use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/phpinfo', function() {
//});

Auth::routes();

Route::get('/email', function () {
    return new \App\Mail\NewUserWelcomeMail();
});

//Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index');
Route::get('/profile/{user}/edit','App\Http\Controllers\ProfilesController@edit');
Route::patch('/profile/{user}','App\Http\Controllers\ProfilesController@update');

Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::get('/p/create','App\Http\Controllers\PostsController@create');
Route::post('/p','App\Http\Controllers\PostsController@store');
Route::get('/p/{post}','App\Http\Controllers\PostsController@show');

Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store');
//Route::get('/users', 'App\Http\Controllers\UserController@index');
