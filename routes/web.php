<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('login.index');
})->name('login');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/verified', function () {
    return view('auth.verified');
})->name('profile')->middleware(['auth', 'verified']);

Route::post('/login', [LoginController::class, 'doLogin']);
Route::get('/register', [RegisterController::class, 'register'] );
Route::post('/register', [RegisterController::class, 'getRegister'] );


Route::get('/profile', function () {
    return "halaman user";
})->name('profile');

Route::middleware(AdminMiddleware::class)->group(function (){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'doLogout']);
    Route::resource('/pembayaran', PembayaranController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/kategori', CategoryController::class);

    Route::get('/stok', function () {
        return view('stok.index');
    });
   
    Route::get('/rekening', function () {
        return view('rekening.index');
    });
    Route::get('/user', function () {
        return view('user.index');
    });

    Route::get('/ongkir', function () {
        return view('ongkir.index');
    });

});




