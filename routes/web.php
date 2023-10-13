<?php

use App\Livewire\CreateActivity;
use App\Livewire\UpdateActivity;
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
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::get('/create-activity', CreateActivity::class)->name('create');
    Route::get('/update-activity/{activity}', UpdateActivity::class)->name('update');
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
