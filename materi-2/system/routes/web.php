<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\KategoriController;



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


Route::get('/contact', function() {
	return view("contact");
});

Route::get('/register', function() {
	return view("register");
});

 Route::get('/home', [ClientController:: class, 'index']); 

// Route::get('/home', function() {
	// return view("home");

Route::get('/detail', function() {
	return view("detail");
});


Route::get('/beranda',[HomeController :: class, 'showBeranda']);
Route::get('beranda/{status}',[HomeController :: class, 'showBeranda']);
Route::get('/barang',[HomeController :: class, 'showBarang']);
Route::get('/kategori',[HomeController :: class, 'showKategori']);


Route::get('setting', [SettingController:: class, 'index']);
Route::post('setting', [SettingController:: class, 'store']);
Route::get('test/{produk}/{hargaMin?}/{hargaMax?}', [HomeController::class, 'test']);


Route::prefix('admin')->middleware('auth')->group(function(){
	Route::post('produk/filter',[ProdukController :: class, 'filter']);
	Route::resource('/produk', ProdukController :: class);
	Route::resource('product', ProductController :: class);
    Route::resource('/user', UserController :: class);
    Route::resource('/kategori', KategoriController :: class);
});
  
    

Route::get('/login',[AuthController :: class, 'showLogin'])->name('login');
Route::post('/login',[AuthController :: class, 'loginProcess']);
Route::get('/logout',[AuthController :: class, 'logout']);

Route::get('test-collection', [ProdukController::class, 'testCollection']);
Route::get('test-ajax', [ProdukController::class, 'testAjax']);

