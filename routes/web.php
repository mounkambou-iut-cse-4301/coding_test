<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::post('/save', [MainController::class,'save'])->name('save');
Route::post('/check', [MainController::class,'check'])->name('check');
Route::get('/logout', [MainController::class,'logout'])->name('logout');
Route::post('/insert', [MainController::class,'insert'])->name('insert');
Route::post('/insert_update/{id?}', [MainController::class,'insert_update'])->name('insert_update');

Route::middleware(['AuthCheck'])->group(function () {
    Route::get('/login', [MainController::class,'login'])->name('login');
    Route::get('/register', [MainController::class,'register'])->name('register');
    Route::get('/dashboard', [MainController::class,'dashboard'])->name('dashboard');
    Route::get('/create_product', [MainController::class,'create_product'])->name('create_product');
    Route::get('/products', [MainController::class,'products'])->name('products');
    Route::get('/read/{id?}', [MainController::class,'read'])->name('read');
    Route::get('/delete/{id?}', [MainController::class,'delete'])->name('delete');
    Route::get('/update/{id?}', [MainController::class,'update'])->name('update');
});
