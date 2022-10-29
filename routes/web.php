<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WilayahController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/detail/{slug}', [FrontendController::class, 'detail'])->name('detail');
Route::get('/artikel/kategori/{id}', [FrontendController::class, 'view']);
Route::get('/', [FrontendController::class, 'index']);

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


//

Route::resource('artikel', ArtikelController::class);


Route::group(['middleware'=>['auth','Admin']],function(){
    Route::resource('karyawan', UserController::class);
    Route::resource('kategori',KategoriController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('wilayah', WilayahController ::class);
});
