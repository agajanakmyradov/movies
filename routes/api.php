<?php

use App\Http\Controllers\Api\V1\GenreController;
use App\Http\Controllers\Api\V1\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/genres', [GenreController::class, 'index'])->name('api.genres.index');

Route::get('/genres/{id}', [GenreController::class, 'show'])->name('api.genres.show');

Route::get('/movies', [MovieController::class, 'index'])->name('api.movies.index');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('api.movies.show');
