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
})
    ->name('home');

Route::get('/login/discord/redirect', 'Auth\LoginController@discordRedirect')
    ->name('login.discord');

Route::get('/login/discord/callback', 'Auth\LoginController@discordCallback');

Route::get('/dashboard', function () {
    echo "loggined in";
})->middleware('auth');
