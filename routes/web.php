<?php

use App\Http\Controllers\CabbageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::inertia('/about', 'About')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/cabbage', [CabbageController::class, 'store'])->name('cabbage.store');
    Route::patch('/cabbage/{cabbage}', [CabbageController::class, 'addUser'])->name('cabbage.add-user');
    Route::delete('/cabbage/{cabbage}', [CabbageController::class, 'destroy'])->name('cabbage.delete');
});

require __DIR__ . '/auth.php';
