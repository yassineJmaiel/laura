<?php

use App\Http\Controllers\MoneyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableventeController;
use App\Models\tablevente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::post('add',[ProductController::class,'store']);
Route::get('list',[ProductController::class,'index'])->middleware("auth");
Route::get('add_product',[ProductController::class,'indexx']);

Route::get('update/{id}',[ProductController::class,'updateview']);
Route::post('update/{id}',[ProductController::class,'update']);
Route::get('delete/{id}',[ProductController::class,'destroy']);
Route::get('sell',[MoneyController::class,'index']);
Route::get('sells',[ProductController::class,'indexxx']);

Route::post('sellproduct',[MoneyController::class,'sell']);

Route::post('rapport',[TableventeController::class,'generateReport']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
