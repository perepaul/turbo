<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\User\ActivationController;
use App\Http\Controllers\User\Dashboard;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\KycController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WithdrawController;
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
// Route::namespace('User')->group(function(){

Route::get('get-states', [LocationController::class, 'getStates']);

Route::as('activation.')->prefix('activation')->group(function () {
    Route::get('step-one', [ActivationController::class, 'stepOne'])->name('step.one');
    Route::post('step-one', [ActivationController::class, 'storeStepOne'])->name('store.step.one');

    Route::get('step-two', [ActivationController::class, 'stepTwo'])->name('step.two');
    Route::post('step-two', [ActivationController::class, 'storeStepTwo'])->name('store.step.two');

    Route::get('complete', [ActivationController::class, 'complete'])->name('complete');
    Route::get('rejected', [ActivationController::class, 'rejected'])->name('rejected');
});
Route::middleware(['active', 'subscribed'])->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('index');

    Route::prefix('trade')->name('trade.')->group(function () {
        Route::get('', [TradeController::class, 'index'])->name('index');
        Route::get('market-data', [TradeController::class, 'market'])->name('market');
        Route::post('create', [TradeController::class, 'trade'])->name('create');
        // Route::get('history', [TradeController::class, 'history'])->name('history');
        Route::get('end/{id}', [TradeController::class, 'end'])->name('end');
    });

    Route::prefix('deposit')->name('deposit.')->group(function () {
        Route::get('', [DepositController::class, 'index'])->name('index');
        Route::post('create', [DepositController::class, 'create'])->name('create');
        Route::get('history', [DepositController::class, 'history'])->name('history');
    });

    Route::prefix('withdrawal')->name('withdrawal.')->group(function () {
        Route::get('', [WithdrawController::class, 'index'])->name('index');
        Route::post('create', [WithdrawController::class, 'create'])->name('create');
        Route::get('history', [WithdrawController::class, 'history'])->name('history');
    });
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::prefix('secuirty')->as('security.')->group(function () {
        Route::get('password', [ProfileController::class, 'password'])->name('password');
        Route::post('password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::get('two-factor', [ProfileController::class, 'twoFactor'])->name('two-factor');

        Route::get('sessions', [ProfileController::class, 'sessions'])->name('sessions');
    });

    Route::get('preference', [ProfileController::class, 'preference'])->name('preference');
    Route::post('preference/update', [ProfileController::class, 'preferenceSecurity'])->name('preference.update');

    Route::get('subscriptions', [SubscriptionController::class, 'subscriptions'])->name('subscriptions');
    Route::get('subscribe/{id}', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe');

    Route::prefix('kyc')->as('kyc.')->group(function () {
        Route::get('', [KycController::class, 'index'])->name('index');
        Route::post('upload-cert/{id}', [KycController::class, 'upload'])->name('upload');
    });
});
