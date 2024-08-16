<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MiniGame;

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

Route::get('/', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/', [LoginController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/mini', [MiniGame\MiniGameController::class, 'index']);

// Mini Game
Route::group(
    ['middleware' => 'minigame', 'prefix' => 'minigame', 'as' => 'minigame.'],
    function () {
        Route::get('/', [MiniGame\MiniGameController::class, 'index'])
            ->name('index');
    }
);

