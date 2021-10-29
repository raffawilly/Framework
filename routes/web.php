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

Route::prefix('admin')->group(function () {
    Route::get('/',[adminController::class,'index'])->name('admin_index');
    Route::prefix('/book')->group(function () {
        Route::get('/insert',[adminController::class,'book_index'])->name('book_insert');
        Route::post('/insert',[adminController::class,'book_insert']);

        Route::get('/list',[adminController::class,'book_list'])->name('book_list');
        Route::post('/list',[adminController::class,'book_list_search']);

        Route::get('/hapus_buku/{id}',[adminController::class,'hapus_buku']);

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
    });
});

Route::prefix('student')->group(function () {
    Route::get('/',[studentController::class,'index'])->name('student_index');
});
