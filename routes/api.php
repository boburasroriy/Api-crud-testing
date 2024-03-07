<?php

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
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'Show'])->name('Show');
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'Store'])->name('Store');
Route::put('/posts/{id}', [\App\Http\Controllers\PostController::class, 'Update'])->name('Update');
Route::delete('/posts/{id}', [\App\Http\Controllers\PostController::class, 'Destroy'])->name('Destroy');

