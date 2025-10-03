<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MusicController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    // CRUD Musiques
    Route::get('/musics', [MusicController::class, 'index']);   // Liste
    Route::post('/musics', [MusicController::class, 'store']);  // Créer
    Route::get('/musics/{id}', [MusicController::class, 'show']); // Détails
    Route::put('/musics/{id}', [MusicController::class, 'update']); // Modifier
    Route::delete('/musics/{id}', [MusicController::class, 'destroy']); // Supprimer
   

});

// Authentification (Breeze API)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
  



Route::apiResource('playlists', PlaylistController::class);
Route::apiResource('music', MusicController::class);
Route::apiResource('playlists', PlaylistController::class);
Route::apiResource('users', UserController::class);
