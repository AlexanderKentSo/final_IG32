<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MiniGame;
use App\Http\Controllers\Peserta;

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
        Route::post('/get-active-cell', [MiniGame\MiniGameController::class, 'getActiveCell'])
            ->name('cell.active');
        Route::post('/submit', [MiniGame\MiniGameController::class, 'submit'])
            ->name('submit');
    }
);

// Peserta
Route::group(
    ['middleware' => 'peserta', 'prefix' => 'peserta', 'as' => 'peserta.'],
    function () {
        Route::get('/', [Peserta\PesertaController::class, 'index'])
            ->name('index');
    }
);

