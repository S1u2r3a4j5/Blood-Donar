<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\AuthController;

// routes/api.php

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('/', [BloodController::class, 'index'])->name('blood-index');

Route::get('/search', [BloodController::class, 'search'])->name('blood-search');
Route::get('/search-gainer', [BloodController::class, 'searchGainer'])->name('blood-gainer');

Route::post('/login', [AuthController::class, 'login'])->name('login.dashboard');

Route::group(['prefix' => 'blood'], function () {

    Route::post('/store', [BloodController::class, 'store'])->name('blood-store');

    Route::get('/search/results', [BloodController::class, 'show'])->name('blood.search.results');

    // donar search
    Route::get('/donor-search', [BloodController::class, 'donarSearch'])->name('donar-search');
    Route::get('/gainer-search', [BloodController::class, 'gainerSearchWithoutLogin'])->name('gainer-search');

    Route::post('/gainer-registration', [BloodController::class, 'gainerRegister'])->name('gainer.registration');


    //---------- Loged in user --------------
    Route::get('/loged-in-user', [BloodController::class, 'loginUserShow'])->name('logedIn');

    //---------- Logged in user search --------------
    Route::get('/donor-search-login-user', [BloodController::class, 'donarSearchLoginUser'])->name('donar-search.login.user');
    Route::get('/gainer-search-login-user', [BloodController::class, 'gainerSearchLoginUser'])->name('gainer-search.login.user');

    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
});
// This defines the logout route for the API
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout.user');


