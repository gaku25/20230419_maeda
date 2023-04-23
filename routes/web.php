<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use app\Http\Controllers\Auth\RegisteredUserController;
use \app\Http\Middleware;

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

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/', [TaskController::class, 'index'])->middleware('auth');
Route::post('/add', [TaskController::class, 'create']);
Route::post('/edit', [TaskController::class, 'update']);
Route::post('/del', [TaskController::class, 'remove']);
Route::get('/find', [TaskController::class, 'find']);
Route::get('/search', [TaskController::class, 'search']);
Route::get('/auth', [AuthorController::class,'check']);
Route::post('/auth', [AuthorController::class,'checkUser'])->middleware('auth');
Route::get('/register', [app\Http\Controllers\Auth\RegisteredUserController::class,'create']);
Route::post('/register', [app\Http\Controllers\Auth\RegisteredUserController::class,'store']);
Route::get('/login', [app\Http\Controllers\Auth\AuthenticatedSessionController::class,'create']);
Route::post('/login', [app\Http\Controllers\Auth\AuthenticatedSessionController::class,'store']);
Route::post('/logout', [app\Http\Controllers\Auth\AuthenticatedSessionController::class,'destroy']);

require __DIR__.'/auth.php';
