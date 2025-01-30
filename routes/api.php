<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('novo_projeto', function () {
    return 'Novo projeto pronto!!';
});

// Acessos
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Cidade
Route::get('cidades', [CidadeController::class, 'index'])->name('listar_cidade');

// Medicos
Route::get('medicos', [MedicoController::class, 'index'])->name('listar_medicos');

Route::post('medicos', [MedicoController::class, 'store'])->middleware('auth:api')->name('adicionar_medicos');
Route::get('cidades/{id_cidade}/medicos', [MedicoController::class, 'lista_medicos_cidade'])->middleware('auth:api')->name('medicos_de_cidade');
Route::post('medicos/consulta', [MedicoController::class, 'agendar_consulta'])->middleware('auth:api')->name('Agendar_consulta');

// Paciente
Route::get('medicos/{id_medico}/pacientes', [PacienteController::class, 'listar_pacientes_do_medico'])->middleware('auth:api')->name('paciente_do_medico');
Route::put('pacientes/{id_paciente}', [PacienteController::class, 'update'])->middleware('auth:api')->name('atualiza_paciente');
Route::post('pacientes', [PacienteController::class, 'store'])->middleware('auth:api')->name('adiciona_paciente');
