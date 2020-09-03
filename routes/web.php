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




// Route::middleware('guest')->group(function(){
    Route::get('/', 'AuthController@loginview')->name('loginview');
    Route::post('/login', 'AuthController@postlogin')->name('login');
// // });

// auth Admin
// Route::middleware('auth')->group(function(){
    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('/regis', 'AdminController@registerview')->name('regis');
    Route::post('/registers', 'AdminController@postregister')->name('registers');
    Route::get('/logout', 'AdminController@logout')->name('logout');
    Route::resource('student', 'studentController');
    // Route::get('/newstudent', 'AdminController@create')->name('newstudent');
    Route::get('/student/edit/{student}', 'StudentController@edit')->name('editstudent');
    Route::post('/savestudent', 'StudentController@store')->name('savestudent');
    // Route::DELETE('/student/{student}', 'StudentController@destroy')->name('student.DEL');
  // });
    


Auth::routes();

Route::get('/About', function () {
            return view('About');
        });