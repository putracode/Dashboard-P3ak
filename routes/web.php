<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;

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
//     return view('auth.login');
// });

// Route::get('/home', function () {
//     return view('auth.login');
// });

route::get('/',[HomeController::class,'index']);
route::get('/modal',[HomeController::class,'modal']);
route::get('/login',[LoginController::class,'index']);
route::post('/login',[LoginController::class,'authenticate']);
route::post('/logout',[LoginController::class,'logout']);

route::get('/admin/dashboard',[DashboardController::class,'index']);

route::resource('admin/user',UserController::class);
route::resource('admin/link',LinkController::class);
route::resource('admin/kategori',KategoriController::class);
route::resource('admin/galeri',GaleriController::class);
