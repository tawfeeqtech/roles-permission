<?php

use App\Http\Controllers\Admin\Api\RoleController;
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


Route::get('/permissions', [RoleController::class, 'permissions']);
Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'store']);
Route::get('/roles/{role}', [RoleController::class, 'show']); // Get a single role
Route::put('/roles/{role}', [RoleController::class, 'update']); // Update a role
Route::delete('/roles/{role}', [RoleController::class, 'destroy']); // Delete a role
