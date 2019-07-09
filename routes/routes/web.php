<?php

URL::forceScheme('https');

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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);

Route::get('/graph', 'HomeController@graph');
Route::get('/signin', 'AuthController@signin');
Route::get('/callback', 'AuthController@callback');
Route::get('/signout', 'AuthController@signout');
Route::get('/calendar', 'CalendarController@calendar');

Route::post('/', 'HomeController@store')->name('home.store');

Route::post('/admin/messages', 'MessageController@store')->name('messages.store');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware'=>'auth'], function() {

    Route::get('/admin', function(){
        return view('admin.dashboard');
    })->name('admin.index');
    
    Route::resource('/admin/medias', 'AdminMediasController', ['names'=>[
        'index'=>'admin.medias.index',
        'create'=>'admin.medias.create',
        'edit'=>'admin.medias.edit'
    ]]);
    
    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'edit'=>'admin.users.edit'
    ]]);
    
    Route::get('/admin/messages', 'MessageController@index')->name('admin.messages.index');
    Route::get('/admin/messages', 'MessageController@show')->name('admin.messages.show');;
    
    Route::get('/send', function(){

    $data = [
        'title'=>'title',
        'content'=>'content'
    ];
    
        Mail::send('emails.test', $data, function($message){
            $message->to('estebandifalco@gmail.com','Esteban')->subject('subject');
        });
    
    });
    
    /*
    Route::resource('/admin/letters', 'LetterController', ['names'=>[
        'index'=>'admin.letters.index',
        'create'=>'admin.letters.create',
        'edit'=>'admin.letters.edit'
    ]]);
    */
    
});
