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
    return view('welcome');
});

Auth::routes();
// Broadcast::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'ChatController@get_contacts')->name('home');
Route::get('/conversation/{id}', 'ChatController@get_conversation')->name('home');
Route::post('/send-message', 'ChatController@send_message');