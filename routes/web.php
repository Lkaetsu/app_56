<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ProfessorsController;
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

Route::get('/curso', [CursosController::class, 'index']);
Route::post('/curso', [CursosController::class, 'store']);
Route::patch('/curso', [CursosController::class, 'update']);
Route::delete('/curso', [CursosController::class, 'destroy']);

Route::get('/materia', [MateriasController::class, 'index']);
Route::post('/materia', [MateriasController::class, 'store']);
Route::patch('/materia', [MateriasController::class, 'update']);
Route::delete('/materia', [MateriasController::class, 'destroy']);

Route::get('/professor', [ProfessorsController::class, 'index']);
Route::post('/professor', [ProfessorsController::class, 'store']);
Route::patch('/professor', [ProfessorsController::class, 'update']);
Route::delete('/professor', [ProfessorsController::class, 'destroy']);