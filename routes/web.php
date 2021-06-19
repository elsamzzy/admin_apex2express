<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingsController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/', [IndexController::class, 'store']);
Route::post('/reg', [IndexController::class, 'create'])->name('reg');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store']);

Route::get('/details/{track:track_id}', [DetailsController::class, 'index'])->name('details');
Route::post('/details/{track:track_id}', [DetailsController::class, 'store']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings', [SettingsController::class, 'store']);
Route::post('/info', [SettingsController::class, 'info'])->name('info');
