<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/test', [BloodController::class, 'test'])->name('blood-test');


Route::get('/', [BloodController::class, 'index'])->name('blood-index');

Route::get('/search', [BloodController::class, 'search'])->name('blood-search');
Route::get('/search-gainer', [BloodController::class, 'searchGainer'])->name('blood-gainer');

Route::post('/login', [AuthController::class, 'login'])->name('login.dashboard');

Route::group([ 'prefix' => 'blood'], function () {

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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
});
