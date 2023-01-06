<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\VideojuegoController as Videojuego;
use App\Http\Controllers\Api\V1\CategoriaController as Categoria;
use App\Http\Controllers\Api\V1\AulaController as Aula;
use App\Http\Controllers\Api\V1\HorarioController as Horario;
use App\Http\Controllers\Api\V1\EquipoController as Equipo;
use App\Http\Controllers\Api\V1\JugadoreController as Jugadore;
use App\Http\Controllers\Api\V1\PartidainController as Partidain;
use App\Http\Controllers\Api\V1\PartidagrController as Partidagr;
use App\Http\Controllers\Api\V1\InscripcioninController as Inscripcionin;
use App\Http\Controllers\Api\V1\InscripciongrController as Inscripciongr;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1/videojuegos', Videojuego::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/categorias', Categoria::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/aulas', Aula::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/horarios', Horario::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/equipos', Equipo::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/jugadores', Jugadore::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/partidains', Partidain::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/partidagrs', Partidagr::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/inscripcionins', Inscripcionin::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/inscripciongrs', Inscripciongr::class)
    ->only(['index','show', 'destroy'])
    ->middleware('auth:sanctum');

Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);
