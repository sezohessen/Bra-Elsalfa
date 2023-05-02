<?php

use App\Http\Controllers\api\v1\GamesController;
use App\Http\Controllers\api\v1\GameThemesController;
use App\Http\Controllers\api\v1\PlayersController;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function () {
    $test = Player::find('3b4f7acb-49c9-4752-88da-90a6fdafff34');

    return $test->games->first()->gameAnswer;
});

// Start
Route::apiResource('/players',PlayersController::class);
Route::apiResource('/games',GamesController::class);
Route::apiResource('/game-themes',GameThemesController::class);