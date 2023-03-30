<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/add', [TaskController::class, 'create']);
    Route::post('/edit', [TaskController::class, 'update']);
    Route::post('/del', [TaskController::class, 'remove']);
});
