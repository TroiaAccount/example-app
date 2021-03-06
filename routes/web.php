<?php

use App\Http\Controllers\CabinetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, "showPage"]);
Route::get('/stream/{stream_id}', [StreamController::class, 'showPage'])->name('streamPage');
Route::get('/auth', [UserController::class, 'showAuthPage'])->name('authPage');
Route::get('/register', [UserController::class, 'showRegisterPage'])->name('registerPage');
Route::middleware('auth')->group(function(){
    Route::get('cabinet', [CabinetController::class, 'showPage'])->name('showPage');
});
