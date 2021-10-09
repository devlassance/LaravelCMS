<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Site;

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

Route::get('/', [Site\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('painel')->group(function(){
    Route::get('/', [Admin\HomeController::class, 'index']);
    Route::get('login', [Admin\Auth\LoginController::class, 'showlogin'])->name('login');
    Route::post('login', [Admin\Auth\LoginController::class, 'authenticate'])->name('auth.login');

    Route::get('register', [Admin\Auth\RegisterController::class, 'showregister'])->name('register');
    Route::post('register', [Admin\Auth\RegisterController::class, 'authenticate'])->name('auth.register');
});
