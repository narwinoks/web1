<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/blog', [MainController::class, 'blog']);
Route::get('/studio', [MainController::class, 'studio']);
Route::get('/wedding', [MainController::class, 'wedding']);
Route::get('/prewedding', [MainController::class, 'prewedding']);
Route::get('/engagement', [MainController::class, 'engagement']);
Route::get('/pengajian', [MainController::class, 'pengajian']);
Route::get('/kin', [MainController::class, 'kin']);
Route::get('/pl', [MainController::class, 'pl']);
Route::get('/review', [MainController::class, 'review']);
Route::get('/faq', [MainController::class, 'faq']);
Route::get('/about-us', [MainController::class, 'aboutUs']);
Route::get('/gallery', [MainController::class, 'gallery']);
Route::get('/form', [MainController::class, 'form']);
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register']);

Route::controller(UserController::class)->name('account.')->middleware('auth')->prefix('account')->group(function () {
    Route::get('/', 'account')->name('index');

    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(UserController::class)->name('account.')->prefix('account')->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/update', 'update')->name('update');

    Route::get('/data', 'data')->name('data');
});
