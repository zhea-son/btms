<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\SchedulesController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/signup', [PagesController::class, 'sign_up'])->name('pages.sign_up');
Route::get('/login', [PagesController::class, 'login'])->name('pages.login');
Route::get('/complogin', [PagesController::class, 'login_comp'])->name('pages.login_comp');
Route::get('/live', [SchedulesController::class, 'live'])->name('pages.live');



Route::resource('buses', BusesController::class);

Route::resource('routes', RoutesController::class);

Route::resource('schedules', SchedulesController::class);

Route::get('/search_buses', [BookingsController::class, 'show_search']);
Route::post('/show', [BookingsController::class, 'show']);
Route::post('/booking', [BookingsController::class, 'booking']);
Route::post('/bookings', [BookingsController::class, 'store']);
Route::get('/my_bookings', [BookingsController::class, 'my_bookings']);

/* Company Routes */
Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard')->middleware('company');

Route::get('/company/signup', [CompanyController::class, 'show_signup'])->name('company.signup');

Route::get('/company/login', [CompanyController::class, 'show_login'])->name('company.login');

Route::post('/company/register/new', [CompanyController::class, 'register'])->name('company.register');

Route::post('/company/authenticate', [CompanyController::class, 'authenticate'])->name('company.authenticate');

Route::get('/company/logout', [CompanyController::class, 'logout'])->name('company.logout');




