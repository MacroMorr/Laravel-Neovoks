<?php

/*
Отслеживание URL адреса
*/

use App\Models\Messages;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact',
    'MessageController@index'
)->name('contact');

Route::post('/contact/submit',
    'MessageController@submit'
)->name('contact-form');

Route::get('/message',
    'MessageController@list'
)->name('message');

Route::get(
    '/message/{id}',
    'MessageController@show'
)->name('message-data-one');

Route::get(
    '/message/{id}/update',
    'MessageController@update'
)->name('message-update');

Route::post(
    '/message/{id}/update',
    'MessageController@save'
)->name('message-update-submit');

Route::get('/message/{id}/delete',
    'MessageController@delete'
)->name('message-delete');

Route::get('/search',
    'MessageController@search'
)->name('search');
//Route::get('/search', function(Request $request)
//{
//    return ContactDB::search($request->search)->get();
//})->name('search');

Auth::routes();
// Route::get('/auth/register', 'RegisterController@index')->name('auth.register');
// Route::get('/auth/reset-password', 'ResetPasswordController@showResetForm')->name('auth.reset-password');
// Route::get('/login', 'LoginController@showLoginForm')->name('login');
