<?php

use App\Http\Controllers\RestoController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminHomeController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/attendance',[App\Http\Controllers\AttendanceController::class,'store'])->name('attendance.store');
Route::get('/list',[App\Http\Controllers\RestoController::class,'index'])->name('list');
Route::Resource('/attendance',AttendanceController::class);

Route::get('fullcalender', [FullCalenderController::class, 'index'])->name('fullcalender');
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax'])->name('fullcalenderAjax');
Route::Resource('/admin',AdminController::class);
Route::get('/adminregister',[App\Http\Controllers\AdminController::class,'register'])->name('adminregister');
Route::post('/adminlogin', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminlogin');
Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class,'login']);
    Route::get('logout', [AdminHomeController::class,'index'])->name('admin.logout');
});
Route::get('/email',[AttendanceController::class,'basic_email'])->name('email');
