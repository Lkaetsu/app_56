<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\MateriasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/aluno', [AlunosController::class, 'index']);
Route::post('/aluno', [AlunosController::class, 'store']);
Route::patch('/aluno', [AlunosController::class, 'update']);
Route::delete('/aluno', [AlunosController::class, 'destroy']);

Route::get('/materia', [materiasController::class, 'index']);
Route::post('/materia', [materiasController::class, 'store']);
Route::patch('/materia', [materiasController::class, 'update']);
Route::delete('/materia', [materiasController::class, 'destroy']);