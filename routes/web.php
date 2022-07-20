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

Route::get('/', function () {
    return view('site.home.home');
});
Route::get('/home', function () {
    return view('site.home');
});
Route::get('/events', function(){
    return view('site.home.events');
});
Route::get('/news', function(){
    return view('site.home.news');
});
Route::get('/about', function(){
    return view('site.home.about');
});
Route::get('/member', function(){
    return view('site.home.member');
});
