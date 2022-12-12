<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


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

Route::middleware('isguest')->group(function() {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/login', [TodoController::class, 'login']);
    Route::get('/register', [TodoController::class, 'register'])->name('register-page');
    Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register.input');
    Route::post('/login/aut', [TodoController::class, 'auth'])->name('login.auth');
//     Route::get('/dashboard', [TodoController::class, 'dashboard']);
    });
    
    Route::middleware('islogin')->group(function() {
        Route::get('/todo', [TodoController::class, 'todo']);
        Route::get('/create', [TodoController::class, 'create'])->name('create');
        Route::post('/store', [TodoController::class, 'store'])->name('store');
        // route path yang menggunakan {} berarti dia berperan sebagai parameter route
        //parameter ini bentuknya data dinamis (data yang dikirim ke route untuk diambil ke parameter function controller terkait)
        Route::get('/edit/{id}',[TodoController::class, 'edit'])->name('edit');
        // method route unutuk ubah data di db itu patch/put
        Route::patch('/update/{id}',[TodoController::class, 'update'])->name('update'); 
        Route::get('/delete/{id}',[TodoController::class, 'destroy'])->name('delete'); 
        Route::patch('/complated/{id}',[TodoController::class, 'updateComplated'])->name('update-complated');
    });
    
    
    Route::get('/logout', [TodoController::class, 'logout'])->name('logout');
    
