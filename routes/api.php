<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// List all tasks
Route::get('tasks', [TaskController::class,'index']);

// Create a task
Route::post('task', [TaskController::class,'store']);

// Show a task
Route::get('task/{id}', [TaskController::class,'show']);

// Update a task
Route::put('task/{id}', [TaskController::class,'update']);

// Delete a task
Route::delete('task/{id}', [TaskController::class,'destroy']);
