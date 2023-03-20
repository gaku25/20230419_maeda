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

Route::prefix('/')->group(function(){
    Route::get('', [Taskcontroller::class, 'index']) ;
    Route::get('add', [Taskcontroller::class, 'add']) ;
    Route::put('', [Taskcontroller::class, 'upd']) ;
    Route::delete('', [Taskcontroller::class, 'del']) ;
});
