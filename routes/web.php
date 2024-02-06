<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetITControl;
use App\Http\Controllers\LogPemakaiControl;
use App\Models\assetit;
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
    $assetit = assetit::latest()->paginate(100);
    return view('index', ['assetit' => $assetit]);
})->name('index.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{kd_it}', [AssetITControl::class, 'index'])->name('index');
Route::post('/loginput', [AssetITControl::class, 'create'])->name('create');
Route::post('/loghapus', [AssetITControl::class, 'destroy'])->name('destroy');
Route::post('/logedit', [AssetITControl::class, 'edit'])->name('edit');
Route::post('/store', [AssetITControl::class, 'store'])->name('store');
Route::post('/delete', [AssetITControl::class, 'delete'])->name('delete');

Route::get('/log.index/{kd_it}', [LogPemakaiControl::class, 'index'])->name('log.index');
Route::get('/log.update/{kd_it}', [LogPemakaiControl::class, 'update'])->name('log.update');
Route::post('/log.store/{kd_it}', [LogPemakaiControl::class, 'store'])->name('log.store');