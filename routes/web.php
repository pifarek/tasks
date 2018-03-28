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

Auth::routes();

Route::get('/', 'IndexController@index')->name('home');

// Logout
Route::get('logout', function() {
   \Auth::logout();
   return redirect()->route('home');
});

Route::group(['middleware' => ['auth']], function() {

    // Resource controller
    Route::resource('/tasks', 'TasksController', ['except' => ['show', 'edit', 'update']]);

    Route::group(['prefix' => 'tasks'], function() {
        // Change task status
        Route::get('/status/{id}/{status}', 'TasksController@status')->where('status', 'completed|pending');

        // Delete task
        Route::get('/delete/{id}', 'TasksController@destroy');

        Route::post('/store', 'TasksController@store');
    });
});

