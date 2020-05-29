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

// Route::prefix('assignments')->group(function() {
//     Route::get('/', 'AssignmentsController@index');
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission']], function () {
	Route::resource('assignments', 'AssignmentsController')->except(['destroy']);
	Route::get('assignments/destroy/{id}', 'AssignmentsController@destroy')->name('assignment.destroy');
});
