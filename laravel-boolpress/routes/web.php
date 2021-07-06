<?php

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

Route::get('/' , 'HomeController@index');

// Rotte visibili a tutti i tipi di utenti
Route::get('/posts' , 'PostController@index')->name('posts.name');
Route::get('/posts/{post}' , 'PostController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rotte visibili ad utenti loggati
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function() {
        Route::get('/' , 'HomeController@index')->name('home');

        Route::resource("/posts" , "PostController");
    });
