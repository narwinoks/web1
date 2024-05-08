<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\MainController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return 'Cache cleared and application optimized successfully!';
});

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/studio', 'studio')->name('studio');
    Route::get('/wedding', 'wedding')->name('wedding');
    Route::get('/prewedding', 'prewedding')->name('prewedding');
    Route::get('/engagement', 'engagement')->name('engagement');
    Route::get('/pengajian', 'pengajian')->name('pengajian');
    Route::get('/kin', 'kin')->name('kin');
    Route::get('/pl', 'pl')->name('pl');
    Route::get('/review', 'review')->name('review');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/about-us', 'aboutUs')->name('aboutUs');
    Route::get('/gallery/{slug}', 'gallery')->name('gallery');
    Route::get('/form', 'form')->name('form');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/products', 'products')->name('products');
    Route::get('/product/{slug}', 'product')->name('product');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/form-review', 'formReview')->name('formReview');
    Route::get('/content', 'getContent')->name('content');
    Route::get('/pay', 'pay')->name('pay');
    Route::get('/confirmation', 'confirmation')->name('confirmation');

    Route::post('/reservation', 'reservation')->name('reservation');
    Route::post('/save', 'save')->name('save');
    Route::post('/save-form', 'saveForm')->name('saveForm');
});
Route::controller(UserController::class)->name('account.')->middleware('auth')->prefix('account')->group(function () {
    Route::get('/', 'account')->name('index');

    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(UserController::class)->name('account.')->prefix('account')->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/update-profile', 'updateProfile')->name('updateProfile');
    Route::post('/password', 'updatePassword')->name('password');
    Route::post('/update', 'update')->name('update');

    Route::get('/data', 'data')->name('data');
});
Route::controller(AdminController::class)->name('admin.')->middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/booking', 'booking')->name('booking');
    Route::get('/content', 'content')->name('content');
    Route::get('/image', 'image')->name('image');
    Route::get('/qa', 'qa')->name('qa');
    Route::get('/pricelist', 'pricelist')->name('pricelist');
    Route::get('/review', 'review')->name('review');
    Route::get('/banner', 'banner')->name('banner');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/add', 'productAdd')->name('productAdd');
    Route::get('/products/edit/{id}', 'productEdit')->name('productEdit');
    Route::get('/show-modal', 'showModal')->name('showModal');
    Route::get('/pl-request', 'plRequest')->name('plRequest');
    Route::get('/bank', 'bank')->name('bank');
    Route::get('/order', 'order')->name('order');
    Route::get('/data', 'data')->name('data');
    Route::get('/story', 'story')->name('story');
    Route::get('/category', 'category')->name('category');

    Route::post('/update-content', 'updateContent')->name('updateContent');
    Route::post('/save-content', 'saveContent')->name('saveContent');
    Route::delete('/delete-content', 'deleteContent')->name('deleteContent');
    Route::delete('/product', 'deleteProduct')->name('deleteProduct');
});
