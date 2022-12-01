<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('todo', [\App\Http\Controllers\TodoListController::class, 'getAllTodo']);
// Route::get('todo/{id}', [\App\Http\Controllers\TodoListController::class, 'getTodo']);
Route::put('todo/{id}', [\App\Http\Controllers\TodoListController::class, 'updateTodo']);
Route::post('todo', [\App\Http\Controllers\TodoListController::class, 'createTodo']);
Route::delete('todo/{id}', [\App\Http\Controllers\TodoListController::class, 'deleteTodo']);
