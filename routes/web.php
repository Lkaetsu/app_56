<?php

use App\Http\Controllers\AlunosController;
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