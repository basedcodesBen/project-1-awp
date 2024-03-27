<?php

use App\Http\Controllers\UnivUserController;
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

Route::get('uuser', [UnivUserController::class, 'index'])-> name('uuser-index');
Route::get('uuser-create', [UnivUserController::class, 'create'])->name('uuser-create');
Route::post('uuser-store', [UnivUserController::class, 'store'])->name('uuser-store');