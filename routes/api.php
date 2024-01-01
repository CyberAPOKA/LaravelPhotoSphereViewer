<?php

use App\Http\Controllers\MarkerController;
use App\Http\Controllers\PhotoController;
use App\Models\Photo;
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

Route::post('upload-image', [PhotoController::class, 'store']);
Route::get('storage/{filename}', [PhotoController::class, 'show']);
Route::get('photos', [PhotoController::class, 'photos']);
Route::post('add-marker/{id}', [MarkerController::class, 'store']);
Route::post('update-photo-info/{id}', [PhotoController::class, 'updatePhotoInfo']);
Route::post('update-marker-data/{id}', [MarkerController::class, 'update']);