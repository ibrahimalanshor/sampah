<?php

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\GarbageController;
use Illuminate\Support\Facades\Route;

Route::controller(ProfileController::class)
    ->group(function () {
        Route::get('/profil', 'detailProfile');
        Route::put('/profil', 'updateProfile');
    });

Route::controller(GarbageController::class)
    ->group(function () {
        Route::get('/sampah', 'getAllGarbage');
        Route::post('/sampah', 'createGarbage');
    });