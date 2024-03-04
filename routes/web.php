<?php

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

Route::get('/', [MainController::class, 'index']);
Route::get('/blog', [MainController::class, 'blog']);
Route::get('/studio', [MainController::class, 'studio']);
Route::get('/wedding', [MainController::class, 'wedding']);
Route::get('/prewedding', [MainController::class, 'prewedding']);
Route::get('/engagement', [MainController::class, 'engagement']);
Route::get('/pengajian', [MainController::class, 'pengajian']);
Route::get('/kin', [MainController::class, 'kin']);
