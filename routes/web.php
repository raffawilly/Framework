<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

Route::prefix('welcome')->group(function () {
    Route::get('/login_admin',[User::class,'login_admin']);
    Route::get('/login_student',[User::class,'login_student']);

    Route::post('/login_admin',[User::class,'cek_login_admin']);
    Route::post('/login_student',[User::class,'cek_login_student']);
});

Route::get('/logout',[User::class,'logout']);

Route::prefix('admin')->middleware(['CekRoleAdmin'])->group(function () {
    Route::get('/',[adminController::class,'index'])->name('admin_index');
    Route::prefix('/book')->group(function () {
        Route::get('/insert',[adminController::class,'book_index'])->name('book_insert');
        Route::post('/insert',[adminController::class,'book_insert']);

        Route::get('/list',[adminController::class,'book_list'])->name('book_list');
        Route::post('/list',[adminController::class,'book_list_search']);

        Route::get('/hapus_buku/{id}',[adminController::class,'hapus_buku']);

        Route::get('/ubah_buku/{id}',[adminController::class,'ubah_buku']);
        Route::Post('/ubah_buku/{id}',[adminController::class,'do_ubah_buku']);

        Route::get('/insert_kategori',[adminController::class,'book_kategori'])->name('book_kategori');
        Route::post('/insert_kategori',[adminController::class,'insert_kategori']);
        Route::post('/search_kategori',[adminController::class,'search_kategori']);
        Route::get('/hapus_kategori/{id}',[adminController::class,'hapus_kategori']);

        Route::get('/insert_penerbit',[adminController::class,'book_penerbit'])->name('book_penerbit');
        Route::post('/insert_penerbit',[adminController::class,'insert_penerbit']);
        Route::post('/search_penerbit',[adminController::class,'search_penerbit']);
        Route::get('/hapus_penerbit/{id}',[adminController::class,'hapus_penerbit']);



    });

    Route::prefix('student')-> group(function(){
        Route::get('/insert',[adminController::class,'student_index'])->name('student_insert');
        Route::post('/insert',[adminController::class,'student_insert']);

        Route::get('/list',[adminController::class,'student_list'])->name('student_list');
        Route::post('/list',[adminController::class,'student_list_search']);

        Route::get('/hapus_student/{id}',[adminController::class,'hapus_student']);

        Route::get('/ubah_student/{kd_student}',[adminController::class,'ubah_student']);
        Route::Post('/ubah_student/{kd_student}',[adminController::class,'do_ubah_student']);


    });

    Route::get('/peminjaman',[adminController::class,'peminjaman_index'])->name('peminjaman_index');
    Route::post('/peminjaman',[adminController::class,'peminjaman_post']);

    Route::get('/peminjaman/list',[adminController::class,'peminjaman_list'])->name('peminjaman_list');
    Route::get('/ubah_peminjaman/{id}',[adminController::class,'ubah_peminjaman']);
    Route::Post('/ubah_peminjaman/{id}',[adminController::class,'do_ubah_peminjaman']);

    Route::get('/pengembalian',[adminController::class,'pengembalian_index'])->name('pengembalian_index');
    Route::get('/pengembalian/{id}',[adminController::class,'pengembalian_get']);

    Route::post('/pengembalian/{id}',[adminController::class,'pengembalian_post'])->name('pengembalian_post');

    Route::get('/pengembalian/list',[adminController::class,'pengembalian_list'])->name('pengembalian_list');
    Route::get('/ubah_pengembalian/{id}',[adminController::class,'ubah_pengembalian']);
    Route::Post('/ubah_pengembalian/{id}',[adminController::class,'do_ubah_pengembalian']);

});

Route::prefix('student')->middleware(['CekRoleStudent'])->group(function () {
    Route::get('/',[studentController::class,'index'])->name('student_index');
    Route::get('/pinjamlist',[studentController::class,'pinjamlist']);
    Route::get('/kembalilist',[studentController::class,'kembalilist']);
});
