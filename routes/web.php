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

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('accept');
Route::post('/admin/invites/createuser', 'InviteController@createuser')->name('admin.invites.createuser');

Route::get('/', ['uses' => 'HomeController@create', 'as' => 'home.create']);
Route::post('/', 'HomeController@store')->name('home.store');

Route::post('/admin/messages', 'MessageController@store')->name('messages.store');

Route::middleware(['auth'])->group(function () {
    Route::get('password/expired', 'Auth\ExpiredPasswordController@expired')->name('password.expired');
    Route::post('password/post_expired', 'Auth\ExpiredPasswordController@postExpired')->name('password.post_expired');
    
    Route::middleware(['password_expired'])->group(function () {
        
        Route::group(['middleware'=>'isAdmin'], function() {
            
            Route::get('/admin', 'DashboardController@index')->name('admin.index');
            
            Route::get('/admin/files', 'HomeController@index')->name('admin.files.index');
            
            Route::resource('/admin/users', 'AdminUsersController', ['names'=>[
                'index'=>'admin.users.index',
                'create'=>'admin.users.create',
                'edit'=>'admin.users.edit'
            ]]);
            
            Route::resource('/admin/roles', 'RoleController', ['names'=>[
                'index'=>'admin.roles.index',
                'create'=>'admin.roles.create',
                'edit'=>'admin.roles.edit'
            ]]);
            
            Route::resource('/admin/providers', 'ProviderController', ['names'=>[
                'index'=>'admin.providers.index',
                'create'=>'admin.providers.create',
                'edit'=>'admin.providers.edit'
            ]]);
            
            Route::resource('/admin/invites', 'InviteController', ['names'=>[
                'index'=>'admin.invites.index',
                'create'=>'admin.invites.create',
                'edit'=>'admin.invites.edit',
            ]]);
            
            Route::get('/admin/messages', 'MessageController@index')->name('admin.messages.index');
            Route::get('/admin/messages/{message}', 'MessageController@show')->name('admin.messages.show');;
            
            
            Route::resource('/admin/medias', 'AdminMediasController', ['names'=>[
                'index'=>'admin.medias.index',
                'create'=>'admin.medias.create',
                'edit'=>'admin.medias.edit'
            ]]);
        });
    });
});


/*
 Route::get('/graph', 'HomeController@graph');
 Route::get('/signin', 'AuthController@signin');
 Route::get('/callback', 'AuthController@callback');
 Route::get('/signout', 'AuthController@signout');
 Route::get('/calendar', 'CalendarController@calendar');
 */
