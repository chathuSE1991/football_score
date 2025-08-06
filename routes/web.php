<?php

use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/matches/list', [MatchController::class, 'index'])->name('match.list');
Route::get('/matches/create', [MatchController::class, 'create'])->name('match.create');
