<?php

use App\Http\Controllers\DebtController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('debt', DebtController::class)->except(['index']);

    Route::controller(UserController::class)
    ->prefix('user')
    ->as('user.')
    ->group(function () {
        Route::post('mark-notif', 'markNotification')->name('mark-notification');
        Route::get('home', 'index')->name('index');
        Route::get('history', 'history')->name('history');
        Route::get('debts', 'debts')->name('debts');
        Route::get('leaderboard', 'leaderboard')->name('leaderboard');

        Route::post('find', 'getList')->name('list');
        Route::post('debtor-list', 'debtorList')->name('debtor-list');

    });

    Route::get('ping', fn() => view('ping'))->name('ping.index');
    Route::post('ping', [PingController::class, 'store'])->name('ping.store');
});




require __DIR__.'/auth.php';
