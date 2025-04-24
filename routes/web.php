<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\AuthController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BloodController::class, 'index'])->name('blood-index');



