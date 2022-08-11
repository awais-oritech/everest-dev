<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsInfoController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/countries-list', [ResourceController::class, 'countries'])->name('countries-list');
Route::post('/cities-list', [ResourceController::class, 'cities'])->name('cities-list');

Route::get('/about', function(){
    return view('site.home.about');
});

Route::get('/faq', function(){
    return view('site.home.faq');
});
Route::get('/privacy-policy', function(){
    return view('site.home.privacy-policy');
});

Route::get('/contact-us',[ContactUsController::class,'index'])->name('contact-us');
Route::post('/contact-us',[ContactUsController::class, 'store']);
Route::get('/news',[NewsController::class, 'index'])->name('news');
Route::get('/events',[EventsController::class, 'index'])->name('events');
Route::get('/member',[MemberController::class,'index'])->name('member');
Route::post('/login',[LoginController::class,'customLogin']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/register',[RegisterController::class,'customRegistration']);
Route::get('/news-info/{id}',[NewsInfoController::class,'index'])->name('news-info');
Route::group(['middleware'=>'prevent-back-history'],function(){
Auth::routes();
Route::get('/pricing',[PricingController::class,'index'])->name('pricing');
Route::get('/profile-registration/{id}',[CompanyProfileController::class,'index'])->name('profile-registration');
Route::post('/profile-registration/{id}', [CompanyProfileController::class, 'store']);
Route::get('/search',[SearchController::class, 'index'])->name('search');
});
