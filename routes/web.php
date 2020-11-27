<?php

use App\Http\Controllers\ShowProfile;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/',function(){
    return view('frontend.welcome');
});
Route::get('/profile','ProfileController@index')->name('profile');

Route::get('/home', 'HomeController@index')->name('home');
/*=========================================ADMIN================================= */
Route::group(['prefix' => 'admin','namespace'=>'Admin','as'=>'admin-'], function () {
    //process middleware if user not login 
    Route::get('/login','LoginController@login')->name('login');
    Route::post('/login','LoginController@handleLogin')->name('login');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::group(['middleware' => 'adminlogin'],function(){
        Route::get('/','HomeController@index')->name('home');
        Route::group(['prefix'=>'users','as'=>'user-'],function(){
            Route::get('/','UserController@index')->name('index');
            Route::get('/add','UserController@create')->name('add');
            Route::post('/add','UserController@store')->name('add');
            Route::post('/delete/{id}','UserController@destroy')->name('delete');
        });
        Route::group(['prefix'=>'posts','as'=>'post-'],function(){
            Route::get('/','PostController@index')->name('index');
            Route::get('/add','PostController@create')->name('add');
            Route::post('/add','PostController@store')->name('add');
        });
        Route::group(['prefix'=>'category','as'=>'category-'],function(){
            Route::get('/','CategoryController@index')->name('index');
            Route::get('/add','CategoryController@create')->name('add');
            Route::post('/add','CategoryController@store')->name('add');
        });
    });
});
/*=======================================END_ADMIN================================= */