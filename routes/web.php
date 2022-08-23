<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('index.index');
// });

Auth::routes();
Route::middleware(['auth', 'level:Admin'])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/pendapatan', [App\Http\Controllers\HomeController::class, 'pendapatan'])->name('pendapatan');

    Route::get('/admin/menu', [App\Http\Controllers\menuController::class, 'index'])->name('/admin/menu');
    Route::get('/admin/menu/add', [App\Http\Controllers\menuController::class, 'add'])->name('/admin/menu/add');
    Route::post('/admin/menu/insert', [App\Http\Controllers\menuController::class, 'insert']);
    Route::get('/admin/menu/edit/{id_menu}', [App\Http\Controllers\menuController::class, 'edit'])->name('/admin/menu/edit');
    Route::post('/admin/menu/update/{id_menu}', [App\Http\Controllers\menuController::class, 'update']);
    Route::get('/admin/menu/delete/{id_menu}', [App\Http\Controllers\menuController::class, 'delete'])->name('/admin/menu/delete');

    Route::post('/admin/status/update', [App\Http\Controllers\menuController::class, 'updateStatus']);
    Route::get('/admin/status', [App\Http\Controllers\menuController::class, 'indexStatus'])->name('/admin/status');
    Route::get('/admin/diskon', [App\Http\Controllers\menuController::class, 'indexDiskon'])->name('/admin/diskon');
    Route::post('/admin/diskon/update/{id}', [App\Http\Controllers\menuController::class, 'updateDiskon']);
    
    Route::get('/admin/pemesanan', [App\Http\Controllers\transController::class, 'index'])->name('/admin/pemesanan');
    Route::get('/admin/detail-pemensanan/{no_nota}', [App\Http\Controllers\transController::class, 'indexDetail'])->name('/admin/detail-pemensanan');
    Route::post('/admin/editPemesanan', [App\Http\Controllers\transController::class, 'editStatus']);

    Route::get('/admin/pesan', [App\Http\Controllers\mailController::class, 'index'])->name('/admin/pesan');
    Route::get('/admin/pesan/detail/{id}', [App\Http\Controllers\mailController::class, 'detail'])->name('/admin/detail');
    Route::get('/hitungPesan', [App\Http\Controllers\mailController::class, 'hitungPesan']);

    Route::get('/hitungPesanan', [App\Http\Controllers\menuController::class, 'hitungPesanan']);

    Route::get('/admin/ulasan', [App\Http\Controllers\ratingController::class, 'index']);
    Route::get('/admin/ulasan/detail/{id_rating}', [App\Http\Controllers\ratingController::class, 'detail'])->name('/admin/ulasan/detail');
    Route::get('/hitungRating', [App\Http\Controllers\ratingController::class, 'hitungRating']);


    // Route::get('/cart', [App\Http\Controllers\cartController::class, 'index'])->name('/cart');
    // Route::post('/checkout', [App\Http\Controllers\transController::class, 'trans'])->name('/checkout');
    // Route::post('/addCart', [App\Http\Controllers\transController::class, 'insert']);
    // Route::post('/addQty', [App\Http\Controllers\transController::class, 'update']);
    // Route::get('/delete/{id_item}', [App\Http\Controllers\transController::class, 'delete'])->name('/delete');
    // Route::get('/check/{user_id}', [App\Http\Controllers\indexController::class, 'add'])->name('/check');
    // Route::post('/invoice', [App\Http\Controllers\invoiceController::class, 'index']);
    
    // Route::get('/alamat/{user_id}', [App\Http\Controllers\alamatController::class, 'index'])->name('/alamat');
    // Route::post('/addAlamat', [App\Http\Controllers\alamatController::class, 'insert']);
    // Route::get('/deleteAlamat/{id_alamat}', [App\Http\Controllers\alamatController::class, 'delete'])->name('/deleteAlamat');
    
    // Route::get('/show/{id_menu}', [App\Http\Controllers\indexController::class, 'showProduct'])->name('/show');
    // Route::post('/pesan', [App\Http\Controllers\mailController::class, 'insert']);
});
// Route::middleware(['auth', 'level:Pelanggan'])->group(function () {
    Route::get('/cart', [App\Http\Controllers\cartController::class, 'index'])->name('/cart');
    Route::post('/checkout', [App\Http\Controllers\transController::class, 'trans']);
    Route::post('/addCart', [App\Http\Controllers\transController::class, 'insert']);
    Route::post('/cartQty', [App\Http\Controllers\transController::class, 'update']);
    Route::get('/delete/{id_item}', [App\Http\Controllers\transController::class, 'delete'])->name('/delete');
    Route::get('/check/{user_id}', [App\Http\Controllers\indexController::class, 'add'])->name('/check');
    Route::post('/invoice', [App\Http\Controllers\invoiceController::class, 'index']);
    Route::get('invoice={no_nota}', [App\Http\Controllers\invoiceController::class, 'invoiceIndex']);
    
    Route::get('/alamat/{user_id}', [App\Http\Controllers\alamatController::class, 'index'])->name('/alamat');
    Route::post('/addAlamat', [App\Http\Controllers\alamatController::class, 'insert']);
    Route::get('/deleteAlamat/{id_alamat}', [App\Http\Controllers\alamatController::class, 'delete'])->name('/deleteAlamat');
    
    Route::get('/history', [App\Http\Controllers\indexController::class, 'history'])->name('/history');

    Route::get('/show/{id_menu}', [App\Http\Controllers\indexController::class, 'showProduct'])->name('/show');
    Route::post('/pesan', [App\Http\Controllers\mailController::class, 'insert']);

    Route::post('/addRating', [App\Http\Controllers\ratingController::class, 'addRating']);
    
// });

    Route::get('/hitung', [App\Http\Controllers\cartController::class, 'hitung']);
    Route::get('/status/{no_nota}', [App\Http\Controllers\invoiceController::class, 'status']);
    Route::post('/updateStatus', [App\Http\Controllers\invoiceController::class, 'updateStatus']);

    Route::get('/', [App\Http\Controllers\indexController::class, 'index'])->name('/');

    Route::get('/menu', [App\Http\Controllers\menuController::class, 'menu']);


