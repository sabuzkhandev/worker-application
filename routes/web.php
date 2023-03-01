<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MasterSetup\MasterSetupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CustomAuthController::class)->group(function () {
    Route::get('logout', 'destroy')->name('logout');
});

Route::controller(MasterSetupController::class)->group(function () {
    Route::get('create-worker', 'create')->name('create.worker');
    Route::post('insert-worker', 'insert')->name('insert.worker');
    Route::get('worker_list', 'workerList')->name('worker_list');
    Route::get('bill-price', 'bill_price_create')->name('bill.price');
    Route::post('bill-price-insert', 'bill_price_insert')->name('insert_bill_price');
    Route::get('bill-price-list', 'bill_price_list')->name('bill_price_list');
    Route::get('create_daily_production', 'createProduction')->name('createDailyProduction');
    Route::post('insert_daily_production', 'InsertProduction')->name('insertDailyProduction');
    Route::get('daily-production-list', 'productionList')->name('dailyProductionList');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
