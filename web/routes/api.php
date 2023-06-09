<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoItemController;


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
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('todos', TodoItemController::class, [
        'only' => [
            'index',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ]
    ]);
    Route::patch('todos/{todo}/done', [TodoItemController::class, 'done']);
    Route::patch('todos/{todo}/undone', [TodoItemController::class, 'undone']);
});