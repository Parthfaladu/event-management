<?php

use App\Http\Controllers\{ProfileController, EventController};
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

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/update/{event}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/update/{event}', [EventController::class, 'destroy'])->name('event.delete');
});

require __DIR__.'/auth.php';
