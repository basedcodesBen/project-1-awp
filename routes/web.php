<?php

use App\Http\Controllers\UnivUserController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

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
    return view('starter');
});

// Admin::Users Route
Route::get('uuser', [UnivUserController::class, 'index'])-> name('uuser-index');
Route::get('uuser-create', [UnivUserController::class, 'create'])->name('uuser-create');
Route::post('uuser-store', [UnivUserController::class, 'store'])->name('uuser-store');
Route::get('uuser-edit/{uuser}', [UnivUserController::class, 'edit'])->name('uuser-edit');
Route::post('uuser-update/{uuser}', [UnivUserController::class, 'update'])->name('uuser-update');
Route::get('uuser-delete/{uuser}', [UnivUserController::class, 'destroy'])->name('uuser-delete');

// Admin::Prodi Route
Route::get('prodi', [ProdiController::class, 'index'])->name('prodi-index');
Route::get('prodi-create', [ProdiController::class, 'create'])->name('prodi-create');
Route::post('prodi-store', [ProdiController::class, 'store'])->name('prodi-store');
Route::get('prodi-edit/{prodi}', [ProdiController::class, 'edit'])->name('prodi-edit');
Route::post('prodi-update/{prodi}', [ProdiController::class, 'update'])->name('prodi-update');
Route::get('prodi-delete/{prodi}', [ProdiController::class, 'destroy'])->name('prodi-delete');