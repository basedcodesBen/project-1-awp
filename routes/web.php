<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnivUserController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PollingController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Admin::Miscellanous
    Route::get('dashTemp', [UnivUserController::class, 'dashTemp'])->name('dashTemp');


// Admin::Users Route
    Route::get('user', [UnivUserController::class, 'index'])-> name('user-index');
    Route::get('user-create', [UnivUserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UnivUserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{user}', [UnivUserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{user}', [UnivUserController::class, 'update'])->name('user-update');
    Route::get('user-delete/{user}', [UnivUserController::class, 'destroy'])->name('user-delete');

// Admin::Prodi Route
    Route::get('prodi', [ProdiController::class, 'index'])->name('prodi-index');
    Route::get('prodi-create', [ProdiController::class, 'create'])->name('prodi-create');
    Route::post('prodi-store', [ProdiController::class, 'store'])->name('prodi-store');
    Route::get('prodi-edit/{prodi}', [ProdiController::class, 'edit'])->name('prodi-edit');
    Route::post('prodi-update/{prodi}', [ProdiController::class, 'update'])->name('prodi-update');
    Route::get('prodi-delete/{prodi}', [ProdiController::class, 'destroy'])->name('prodi-delete');

// Route to display the poll to students
    Route::get('/poll', [PollingController::class, 'showPoll'])->name('poll.show');

// Route to display the poll results to prodi
    Route::get('polls/details', [PollingController::class, 'showProdi'])->name('poll.details.show');
    Route::get('polls/{id_polling}/results', [PollingController::class, 'viewResults'])->name('polls.results');

// Route to handle the voting process
    Route::post('/poll/vote', [PollingController::class, 'vote'])->name('poll.vote');

// Route to display the poll creation form
    Route::get('/poll/create', [PollingController::class, 'createForm'])->name('poll.create');

// Route to handle the submission of the poll creation form
    Route::post('/poll/store', [PollingController::class, 'store'])->name('poll.store');
    Route::get('/poll/{id}', [PollingController::class, 'showPollDetails'])->name('poll.details');
    Route::post('/vote', [PollingController::class, 'vote'])->name('poll.vote');

// Route to handle add or remove course
    Route::get('/matakuliah',[MatkulController::class, 'index'])->name('matkul');
    Route::get('/tambahmatakuliah',[MatkulController::class, 'create'])->name('tambahmatkul');
    Route::post('/tambahmatakuliah/store',[MatkulController::class, 'store'])->name('tambahmatkul.store');
    Route::post('/matakuliah/hapus',[MatkulController::class, 'remove'])->name('hapusmatkul');
});

require __DIR__.'/auth.php';
