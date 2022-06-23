<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;



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

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/inventory', function () {
//     return view('inventory');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login') ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('home', [HomeController::class, 'index']);