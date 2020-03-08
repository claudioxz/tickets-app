<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function(){
        dd(Auth::user());
        return view('index');
    })->name('home');


    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', function (){
            dd('holi admin');
        })->name('admin');
    });
});

Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::get('/login-register', 'Auth\AuthController@loginForm')->name('login-register');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

