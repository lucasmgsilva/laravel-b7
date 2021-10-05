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
    Route::get('/', [TarefaController::class, 'list'])->name('tarefas.list');
    
    Route::get('add', [TarefaController::class, 'add'])->name('tarefas.add');
    Route::post('add', [TarefaController::class, 'addAction']);
    
    Route::get('edit/{id}', [TarefaController::class, 'edit'])->name('tarefas.edit');
    Route::post('edit/{id}', [TarefaController::class, 'editAction']);
    
    Route::get('delete/{id}', [TarefaController::class, 'del'])->name('tarefas.del');
    
    Route::get('marcar/{id}', [TarefaController::class, 'done'])->name('tarefas.done');
});