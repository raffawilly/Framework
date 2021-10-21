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
});

Route::prefix('student')->group(function () {
    Route::get('/',[studentController::class,'index']);
});
