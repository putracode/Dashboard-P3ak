<?php


use App\Models\Highlight;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AplikasiController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HighlightController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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

Route::get('/test', function () {
    return view('auth.password');
});

route::get('/',[HomeController::class,'index']);
route::post('/',[HomeController::class,'authenticate']);
route::get('/modal',[HomeController::class,'modal'])->middleware('auth');
route::get('/login',[LoginController::class,'index']);
route::post('/login',[LoginController::class,'authenticate'])->name('login');
route::post('/logout',[LoginController::class,'logout']);

Route::get('/forgot-password',[ForgotPasswordController::class,'getforgotpassword'])->name('getforgotpassword');
Route::post('/forgot-password',[ForgotPasswordController::class,'postforgotpassword']);
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'getresetpassword'])->middleware('guest')->name('getresetpassword');
Route::post('/reset-password/{token}',[ForgotPasswordController::class,'postresetpassword'])->middleware('guest');

Route::middleware(['auth','admin'])->group(function(){
    route::get('/admin/dashboard',[DashboardController::class,'index']);
    route::post('/admin/dashboard/{id}',[DashboardController::class,'update']);
    route::resource('admin/user',UserController::class);
    route::post('admin/user/password/{id}',[UserController::class,'password']);
    route::resource('admin/link',LinkController::class);
    route::resource('admin/kategori',KategoriController::class);
    route::resource('admin/galeri',GaleriController::class);
    route::resource('admin/highlight',HighlightController::class);
    route::resource('admin/aplikasi',AplikasiController::class);
});

