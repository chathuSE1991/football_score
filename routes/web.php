<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchScoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MatchController::class, 'mainPage'])->name('match.index');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
 Auth::routes();
Route::middleware('auth')->group(function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/matches/list', [MatchController::class, 'index'])->name('match.list');
Route::get('/matches/create', [MatchController::class, 'create'])->name('match.create');
Route::post('/matches/create', [MatchController::class, 'store'])->name('match.store');
Route::get('/matches/score/update/{id}', [MatchController::class, 'show'])->name('match_score.show');



Route::get('/matches/score/list', [MatchScoreController::class, 'index'])->name('match_score.list');
Route::get('/matches/start/{id}', [MatchScoreController::class, 'startMatch'])->name('match.start');
Route::put('/matches/score/update/{id}', [MatchScoreController::class, 'updateScore'])->name('match_score.update');
Route::get('/matches/end/{id}', [MatchScoreController::class, 'endMatch'])->name('match.end');
});
