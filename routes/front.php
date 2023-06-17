<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;

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

Route::namespace('Front')->group(function () {
    Route::get('', [PagesController::class, 'index'])->name('index');
    Route::get('/referrer/{referral_code}', [PagesController::class, 'referral'])->name('referral');
    // Route::get('about', [PagesController::class, 'about'])->name('about');
    // Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    // Route::get('faq', [PagesController::class, 'faq'])->name('faq');
    Route::post('contact', [PagesController::class, 'sendContact'])->name('send.contact');
});
