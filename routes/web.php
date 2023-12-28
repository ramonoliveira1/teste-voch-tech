<?php

use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\UnidadesController;
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

Route::get('/', [UnidadesController::class, 'index']);

Route::resource("unidades", UnidadesController::class);
Route::get("/colaboradores/ranking", [ColaboradoresController::class, 'ranking'])->name("colaboradores.ranking");
Route::get("/colaboradores/{colaborador}/grade", [ColaboradoresController::class, 'gradeForm'])->name("colaboradores.gradeedit");
Route::put('/colaboradores/gradeupdate/{colaborador_id}', [ColaboradoresController::class, 'gradeUpdate'])->name('colaboradores.gradeupdate');
Route::resource("colaboradores", ColaboradoresController::class);
