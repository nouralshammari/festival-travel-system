<?php

use App\Models\Festival;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FestivalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Get all festivals
    $festivals = Festival::all();

    // Pass the festivals data to the view
    return view('welcome', compact('festivals'));
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{id}', [FestivalController::class, 'show'])->name('festivals.show');


require __DIR__.'/auth.php';
