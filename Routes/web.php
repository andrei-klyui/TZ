<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckStatus;
use App\Models\User;
use Illuminate\Support\Facades\Input;

Route::get('/user', 'BookController@user')->name('user');
Route::post('/create/{id}', 'BookController@create')->name('create');

Route::group(['middleware' => ['auth']], function () {

// only auth user admin...

Route::get('/admin', 'BookController@index')
    ->middleware(\App\Http\Middleware\IsAdmin::class)
    ->name('admin');
Route::post('/add_photo/{id}', 'BookController@add_photo')
    ->name('add_photo');
});

Route::post('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('register', 'RegisterController@register');

// bonus)
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes(['verify' => false]);
