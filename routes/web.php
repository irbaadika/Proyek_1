<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DashboardInventoryController;



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

//INVENTORY
Route::get('/inventory', function () {
  return view('inventories',[
      'title' => 'Inventory'
  ]);
});

Route::get('/inventory', [InventoryController::class, 'index']);

//single
Route::get('/inventories', [InventoryController::class, 'index']);
Route::get('/inventories/{inventory:slug}', [InventoryController::class, 'show']);

Route::get('/categories', function(){
  return view('categories', [
      'title'=>'Inventory Categories',
      'categories'=>Category::all()
  ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
  return view('category', [
      'title'=>$category->name,
      'inventories'=>$category->inventories,
      'category'=>$category->name
  ]);
});


//LOGIN LOGOUT
Route::get('/login', function () {
    return view('login');
})->name("login");
Route::post('login1', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('register');
})->name("register");
Route::post('register1', [RegisterController::class, 'register']);

// Route::get('/tambah', function () {
//     return view('tambah');
// })->name("tambah");

Route::resource('/tambah', TambahController::class);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('checkRole:admin');
Route::resource('/dashboard/inventories', DashboardInventoryController::class)->middleware('checkRole:admin');

Route::get('home', [HomeController::class, 'index']);