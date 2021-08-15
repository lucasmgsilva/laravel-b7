<?php

use App\Http\Controllers\TarefaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('tarefas')->group(function(){
    Route::get('/', [TarefaController::class, 'index']);
    
    Route::get('add', [TarefaController::class, 'create']);
    Route::post('add', [TarefaController::class, 'store']);

    Route::get('edit/{id}', [TarefaController::class, 'edit']);
    Route::post('edit/{id}', [TarefaController::class, 'update']);
    
    Route::delete('edit/{id}', [TarefaController::class, 'destroy']);
    
    Route::get('marcar/{id}', [TarefaController::class, 'done']);
});