<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController as AdminHomecontroller;
use App\Http\Controllers\Guest\HomeController as GuestHomecontroller;
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

Route::get('/', [GuestHomecontroller::class, 'index']);

// stabilisco chi controlla questa rotta e come si chiama
Route::get('/home',[AdminHomeController::class,'index'])->middleware(['auth'])->name('home');




Route::middleware('auth')
// tutte le rotte di questo gruppo hanno come prefisso profile e gli do prefix()
    ->prefix('profile')
    // tutti i nomi delle rotte di questo gruppo iniziano con profile quindi do 
    ->name('profile.')
    // group va sempre per ultimo
    ->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';