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
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyProfileViewController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BenefitsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\ProfileProcessController;
use App\Http\Controllers\ProfileSettingsController;

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
Route::get('/', [HomeController::class, 'index']);



Route::prefix('/common')->group(function () {

    Route::post('/countries-list', [ResourceController::class, 'countries'])->name('countries-list');
    Route::post('/cities-list', [ResourceController::class, 'cities'])->name('cities-list');
    Route::post('/newsletter', [ResourceController::class, 'newsletter'])->name('newsletter');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('about-us',[AboutController::class, 'index'])->name('about-us');
Route::get('/page/{slug}',[PageController::class, 'index'])->name('page');
Route::get('/directory',[DirectoryController::class, 'index'])->name('directory');
Route::get('/benefits',[BenefitsController::class, 'index'])->name('benefits');
Route::get('/faq',[FaqController::class, 'index'])->name('faq');
Route::get('/contact-us',[ContactUsController::class,'index'])->name('contact-us');
Route::post('/contact-us',[ContactUsController::class, 'store']);
Route::get('/news',[NewsController::class, 'index'])->name('news');
Route::get('/news/category/{id}',[NewsController::class, 'bycat'])->name('news-category');
Route::get('/events',[EventsController::class, 'index'])->name('events');
Route::get('/member',[MemberController::class,'index'])->name('member');
// Route::post('/login',[LoginController::class,'customLogin']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// Route::post('/register-member',[RegisterController::class,'customRegistration'])->name('register-member');
Route::get('/news-info/{id}',[NewsInfoController::class,'index'])->name('news-info');
Route::get('/packages',[PricingController::class,'index'])->name('packages');
Auth::routes();
Route::middleware(['prevent-back-history'],['companycheck'],['auth'])->group(function () {
    Route::get('/profile-process', [ProfileProcessController::class, 'index'])->name('profile-process');
    Route::post('/profile-process', [ProfileProcessController::class, 'store']);
    Route::get('/profile-registration/{id?}',[CompanyProfileController::class,'index'])->name('profile-registration');
    Route::post('/profile-registration', [CompanyProfileController::class, 'store']);
    Route::get('/search',[SearchController::class, 'index'])->name('search');
    Route::get('/company-profile/{id}',[CompanyProfileViewController::class, 'index'])->name('company-profile');
    Route::get('profile-settings',[ProfileSettingsController::class, 'index'])->name('profile-settings');
    Route::post('update_password/{id}',[ProfileSettingsController::class, 'update_password']);
});

Auth::routes();

