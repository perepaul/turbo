<?php

use Illuminate\Http\Request;
use App\Helpers\CountryHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\TradesController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Admin\PreferenceController;
use App\Http\Controllers\Admin\TradeCurrencyController;
use App\Http\Controllers\Admin\AccountCurrencyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MethodController;
use App\Models\Withdrawal;

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

Route::get('/states', function (Request $request) {
    $helper = new CountryHelper();
    $states = $helper->states($request->country_id)->toArray();
    $html = view()->make('components.states', ['id' => $request->country_id, 'states' => $states])->render();
    return response()->json(['data' => $html]);
})->name('state');
Route::get('/cities', function (Request $request) {
    $helper = new CountryHelper();
    $cities = $helper->cities($request->country_id, $request->state_id)->toArray();
    $html = view()->make('components.city', compact('cities'))->render();
    return response()->json(['data' => $html]);
})->name('city');

Route::get('feature-field', function () {
    $view = view('includes.back.feature-field')->render();
    return response()->json(['data' => $view]);
})->name('feature-field');

Route::get('/', [Dashboard::class, 'index'])->name('index');
Route::as('users.')->prefix('users')->group(function () {
    Route::get('/{status}', [UserController::class, 'index'])->name('index');
    Route::get('{id}/login-as', [UserController::class, 'loginAs'])->name('login-as');
    Route::post('{id}/status', [UserController::class, 'status'])->name('status');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('{id}/delete', [UserController::class, 'delete'])->name('delete');
});
Route::as('trades.')->prefix('trades')->group(function () {
    Route::get('/{status}', [TradesController::class, 'index'])->name('index');
    Route::get('{id}/edit', [TradesController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [TradesController::class, 'update'])->name('update');
    Route::get('{id}/end', [TradesController::class, 'end'])->name('end');
});
Route::as('deposits.')->prefix('deposits')->group(function () {
    Route::get('/{status}', [DepositController::class, 'index'])->name('index');
    Route::get('{id}/approve', [DepositController::class, 'approve'])->name('approve');
    Route::get('{id}/decline', [DepositController::class, 'decline'])->name('decline');
});
Route::as('withdrawals.')->prefix('withdrawals')->group(function () {
    Route::get('/{status}', [WithdrawController::class, 'index'])->name('index');
    Route::get('{id}/approve', [WithdrawController::class, 'approve'])->name('approve');
    Route::get('{id}/decline', [WithdrawController::class, 'decline'])->name('decline');
});
Route::as('emails.')->prefix('emails')->group(function () {
    Route::get('/', [EmailController::class, 'index'])->name('index');
    Route::get('send', [EmailController::class, 'sendPage'])->name('send.page');
    Route::post('send', [EmailController::class, 'send'])->name('send');
    Route::get('{id}/view', [EmailController::class, 'view'])->name('view');
    Route::get('{id}/delete', [EmailController::class, 'delete'])->name('delete');
});
Route::resource('plan', PlanController::class)->except(['show']);
Route::resource('currency', AccountCurrencyController::class)->except(['show']);
Route::resource('trade-currency', TradeCurrencyController::class)->except(['show']);

Route::as('settings.')->prefix('settings')->group(function () {
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact', [ContactController::class, 'update'])->name('contact.update');
    Route::as('profile.')->prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('index');
        Route::post('update', [ProfileController::class, 'update'])->name('update');
    });

    Route::as('security.')->prefix('security')->group(function () {
        Route::get('', [ProfileController::class, 'securityPage'])->name('index');
        Route::post('update', [ProfileController::class, 'securityUpdate'])->name('update');
    });

    Route::as('preference.')->prefix('preferences')->group(function () {
        Route::get('', [PreferenceController::class, 'index'])->name('index');
        Route::post('update', [PreferenceController::class, 'preference'])->name('update');
    });

    Route::resource('methods', MethodController::class)->except('show');
});
