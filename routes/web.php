<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\EsewaController;


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


// Pages Routes
Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/signup', [PagesController::class, 'sign_up'])->name('pages.sign_up')->middleware('guest');
Route::get('/login', [PagesController::class, 'login'])->name('pages.login')->middleware('guest');
Route::get('/live', [SchedulesController::class, 'live'])->name('pages.live');


// User Routes
Route::get('/user/register', [UserController::class, 'user_signup'])->name('users.sign_up')->middleware('guest');
Route::post('/user/new', [UserController::class, 'new_user'])->name('users.new');
Route::get('/user/login', [UserController::class, 'user_login'])->name('users.login')->middleware('guest');
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');
Route::post('/user/logout', [UserController::class, 'logout'])->name('users.logout');

// Resource Controller Routes
Route::resource('buses', BusesController::class);

Route::resource('routes', RoutesController::class);

Route::resource('schedules', SchedulesController::class);
Route::put('/schedules/{id}/complete', [SchedulesController::class , 'completed'])->name('schedules.complete');


// Bookings Routes
Route::get('/search_buses', [BookingsController::class, 'show_search'])->name('search_buses');
Route::post('/search', [BookingsController::class, 'search']);
Route::post('/booking', [BookingsController::class, 'booking'])->middleware('auth');
Route::post('/hand-cash', [BookingsController::class, 'pay_on_bus'])->middleware('auth');
Route::post('/booking/{id}/details', [BookingsController::class, 'booking_details'])->middleware('auth');
Route::post('/user/bookings', [BookingsController::class, 'store'])->middleware('auth');
Route::delete('/user/bookings/{booking}', [BookingsController::class, 'destroy'])->middleware('auth');
Route::get('/user/my_bookings', [BookingsController::class, 'my_bookings'])->name('my_bookings')->middleware('auth');
Route::get('/user/my_history', [BookingsController::class, 'my_history'])->name('my_history')->middleware('auth');


/* Payment Routes */
Route::post('/payment', [EsewaController::class, 'esewa_pay']);
Route::get('/payment/success', [EsewaController::class, 'esewa_pay_success']);
Route::get('/payment/failure', [EsewaController::class, 'esewa_pay_failure']);

/* Company Routes */
Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard')->middleware('company');

Route::get('/company/signup', [CompanyController::class, 'show_signup'])->name('company.signup')->middleware('guest');

Route::get('/company/login', [CompanyController::class, 'show_login'])->name('company.login')->middleware('guest');

Route::post('/company/register/new', [CompanyController::class, 'register'])->name('company.register');

Route::post('/company/authenticate', [CompanyController::class, 'authenticate'])->name('company.authenticate');

Route::get('/company/logout', [CompanyController::class, 'logout'])->name('company.logout');

Route::get('/company/buses', [CompanyController::class, 'my_buses'])->name('company.buses');

Route::get('/company/routes', [CompanyController::class, 'my_routes'])->name('company.routes');

Route::get('/company/schedules', [CompanyController::class, 'my_schedules'])->name('company.schedules');

Route::get('/company/trips', [CompanyController::class, 'my_trips'])->name('company.trips');




