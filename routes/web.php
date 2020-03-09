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

    Route::get('/', 'UserController@index')->name('home');
    Route::get('/mark-ticket/{id}', 'UserController@markTicket')->name('mark-ticket');


    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/create-ticket-form', 'AdminController@createTicketForm')->name('create-ticket-form');
        Route::post('/create-ticket', 'AdminController@createTicket')->name('create-ticket');
        Route::get('/delete-ticket/{id}', 'AdminController@deleteTicket')->name('delete-ticket');
        Route::get('/edit-ticket-form/{id}', 'AdminController@editTicketForm')->name('edit-ticket-form');
        Route::post('/edit-ticket/{id}', 'AdminController@editTicket')->name('edit-ticket');
    });
});

Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::get('/login-register', 'Auth\AuthController@loginForm')->name('login-register');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

