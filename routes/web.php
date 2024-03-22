<?php

<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Profil;
use App\Models\Product;
=======

>>>>>>> 1928141f96737a5db3c4a4c5031104ceb2060b66
use App\Http\Controllers\UserProduct;
=======
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
<<<<<<< HEAD
>>>>>>> parent of 337e907 (kontol)
=======
>>>>>>> parent of 337e907 (kontol)
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListOrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BayarPelangganController;
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

//enail veryfied handler
Route::get('/', [HomeController::class, 'index']);
Route::get('/produkpelanggan', [UserProduct::class, 'index']);
Route::get('/detailproduk/{id}', [UserProduct::class, 'detailProduct']);
Route::get('/about', [HomeController::class, 'about']);


//Route guest
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login.index');
    })->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'doLogin']);
    Route::get('/register', [RegisterController::class, 'register'] );
    Route::post('/register', [RegisterController::class, 'getRegister'] );
});



//route verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/verified', function () {
    return view('auth.verified');
})->name('verified')->middleware(['auth', 'verified']);





/// route data user
Route::post('/logout', [LoginController::class, 'doLogout'])->middleware(['auth']);
Route::middleware(['auth', 'verified'])->group(function () {
<<<<<<< HEAD
    Route::post('/logout', [LoginController::class, 'doLogout']);
=======
>>>>>>> 1928141f96737a5db3c4a4c5031104ceb2060b66
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::get('/cartproduk', [CartController::class, 'index']);
    Route::resource('/listorder', ListOrderController::class);
    Route::resource('/bayarpelanggan', BayarPelangganController::class);
    Route::post('/editalamat/{id}', [AlamatController::class,'editalamat']);
    Route::post('/cartproduk/{id}', [UserProduct::class, 'addToCart']);
<<<<<<< HEAD
<<<<<<< HEAD
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/bayar', [CheckoutController::class, 'bayar'])->name('checkoutbayar');
    Route::post('/checkout/{id}', [CheckoutController::class, 'store']);
=======
>>>>>>> parent of 337e907 (kontol)
=======
>>>>>>> parent of 337e907 (kontol)
    Route::get('/profile', function () {
        return view('user.index');
    })->name('profile');
    Route::get('/konfirm', function () {
        return view('pembayaran.konfirmasi');
    });

<<<<<<< HEAD

<<<<<<< HEAD

=======
=======
>>>>>>> parent of 337e907 (kontol)
    Route::get('/checkout', function () {
        return view('pelanggan.cart.checkout',[
            "active" => "produk",
        ]);
    });
    
>>>>>>> parent of 337e907 (kontol)
});

// route admin
Route::middleware(AdminMiddleware::class)->group(function (){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pembayaran', PembayaranController::class);
    Route::get('/pembayaran/{id}/faktur', [PembayaranController::class, 'cetakFaktur']);
    Route::get('/laporan', [LaporanController::class,'index']);
    Route::get('/cetak', [LaporanController::class,'cetak']);
    Route::post('/accept{id}', [PembayaranController::class, 'accept']);
    Route::post('/deny{id}', [PembayaranController::class, 'deny']);
    Route::post('/selesai{id}', [PembayaranController::class, 'selesai']);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/voucher', VoucherController::class);
    Route::post('/editdata/{id}', [VoucherController::class,'editdata']);
    Route::resource('/rekening', RekeningController::class);
    Route::post('/editrekening/{id_rekening}', [RekeningController::class,'editrekening']);
    Route::resource('/provinsi', ProvinsiController::class);
    Route::post('/editprovinsi/{id_prov}', [ProvinsiController::class,'editprovinsi']);
    Route::resource('/kota', KotaController::class);
    Route::post('/editkota/{id_city}', [KotaController::class,'editKota']);
    Route::resource('/kota', KotaController::class);
    Route::resource('/kategori', CategoryController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/ongkir', OngkirController::class);
    Route::resource('/profil', ProfilController::class);
});


Route::get('/stok', function () {
    return view('stok.index');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



