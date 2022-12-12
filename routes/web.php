<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});

route::get('/login',[LoginController::class,'index']);
route::post('/login',[LoginController::class,'authenticate']);
route::post('/logout',[LoginController::class,'logout']);

route::get('/admin/dashboard',[DashboardController::class,'index']);
// route::get('/admin/user',[UserController::class,'create']);
// route::post('/admin/user',[UserController::class,'store']);
// route::get('/admin/user/edit',[UserController::class,'edit']);
// route::get('/admin/user/edit',[UserController::class,'update']);
// route::get('/admin/user/edit',[UserController::class,'destroy']);

route::resource('admin/user',UserController::class);
route::resource('admin/link',LinkController::class);