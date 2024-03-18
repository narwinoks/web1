<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\UserController;
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
Route::get('/gallery/{slug}', [MainController::class, 'gallery'])->name('gallery');
Route::get('/form', [MainController::class, 'form'])->name('form');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register']);

Route::controller(MainController::class)->group(function () {
    Route::get('/content', 'getContent')->name('content');
    Route::post('/reservation', 'reservation')->name('reservation');
});
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
Route::controller(AdminController::class)->name('admin.')->middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/booking', 'booking')->name('booking');
    Route::get('/content', 'content')->name('content');
    Route::get('/image', 'image')->name('image');
    Route::get('/pricelist', 'pricelist')->name('pricelist');
    Route::get('/show-modal', 'showModal')->name('showModal');

    Route::post('/update-content', 'updateContent')->name('updateContent');
    Route::post('/save-content', 'saveContent')->name('saveContent');

    Route::delete('/delete-content', 'deleteContent')->name('deleteContent');
});
