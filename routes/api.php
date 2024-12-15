<?php

use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(ProfileController::class)
    ->group(function () {
        Route::get('/profile', 'detailProfile');
        Route::put('/profile', 'updateProfile');
    });