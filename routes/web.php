<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ContratoParcelaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParceiroController;
use App\Http\Controllers\TextoContratoController;
use App\Http\Controllers\TipoLancamentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home/{personId?}',[HomeController::class, 'index'])->name('home');

Route::prefix('empresa')->group(function (){
    Route::get('/listar',[EmpresaController::class, 'index'])->name('index');
    Route::get('/adicionar',[EmpresaController::class, 'create']);
    Route::post('/salvar',[EmpresaController::class, 'store']);
    Route::get('/editar/{id}',[EmpresaController::class, 'edit']);
    Route::post('/atualizar/{id}',[EmpresaController::class, 'update']);
    Route::get('/deletar/{id}',[EmpresaController::class, 'destroy']);
});

Route::prefix('clientes')->group(function (){
    Route::get('/listar',[ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/adicionar',[ClienteController::class, 'create']);  
    Route::post('/salvar',[ClienteController::class, 'store']);
    Route::get('/editar/{id}',[ClienteController::class, 'edit']);  
    Route::post('/atualizar/{id}',[ClienteController::class, 'update']);
    Route::get('/deletar/{id}',[ClienteController::class, 'destroy']); 
    Route::get('/report',[ClienteController::class, 'report']); 
});

Route::prefix('parceiros')->group(function (){
    Route::get('/listar',[ParceiroController::class, 'index'])->name('parceiros.index');
    Route::get('/adicionar',[ParceiroController::class, 'create']);
    Route::post('/salvar',[ParceiroController::class, 'store']);
    Route::get('/editar/{id}',[ParceiroController::class, 'edit']);
    Route::post('/atualizar/{id}',[ParceiroController::class, 'update']);
    Route::get('/deletar/{id}',[ParceiroController::class, 'destroy']);
});

Route::prefix('textocontrato')->group(function (){
    Route::get('/listar',[TextoContratoController::class, 'index'])->name('index');
    Route::get('/adicionar',[TextoContratoController::class, 'create']);
    Route::post('/salvar',[TextoContratoController::class, 'store']);
    Route::get('/editar/{id}',[TextoContratoController::class, 'edit']);
    Route::post('/atualizar/{id}',[TextoContratoController::class, 'update']);
    Route::get('/deletar/{id}',[TextoContratoController::class, 'destroy']);
});

Route::prefix('contratos')->group(function (){
    Route::match(['get', 'post'],'/listar',[ContratoController::class, 'index'])->name('contratos.listar');
    Route::get('/adicionar',[ContratoController::class, 'create'])->name('contratos.adicionar');
    Route::post('/salvar',[ContratoController::class, 'store'])->name('contratos.salvar');
    Route::get('/pdf/{id}',[ContratoController::class, 'pdf'])->name('contratos.pdf');
    Route::get('/deletar/{id}',[ContratoController::class, 'destroy'])->name('contratos.deletar');
    Route::get('/calendar',[ContratoController::class, 'calendar'])->name('contratos.calendar');
    Route::get('/lixeira/{id}',[ContratoController::class, 'lixeira'])->name('contratos.lixeira');
    Route::get('/listaLixeira',[ContratoController::class, 'listaLixeira'])->name('contratos.listaLixeira');
    Route::get('/reativar/{id}',[ContratoController::class, 'reativar'])->name('contratos.reativar');
});

Route::prefix('financeiro')->group(function (){
    Route::match(['get', 'post'],'/listar',[ContratoParcelaController::class, 'index'])->name('financeiro.index');;
    Route::get('/editar/{id}',[ContratoParcelaController::class, 'edit']);
    Route::post('/atualizar/{id}',[ContratoParcelaController::class, 'update']);
});

Route::prefix('tipolancamento')->group(function (){
    Route::get('/listar',[TipoLancamentoController::class, 'index'])->name('tipolancamento.index');;
    Route::get('/adicionar',[TipoLancamentoController::class, 'create']);
    Route::post('/salvar',[TipoLancamentoController::class, 'store']);
    Route::get('/editar/{id}',[TipoLancamentoController::class, 'edit']);
    Route::post('/atualizar/{id}',[TipoLancamentoController::class, 'update']);
    Route::get('/deletar/{id}',[TipoLancamentoController::class, 'destroy']);
});

Route::prefix('contas')->group(function (){
    //Rotas de Contas a pagar
    Route::match(['get', 'post'],'/listar',[ContaController::class, 'index'])->name('contas.index');;
    Route::get('/adicionar',[ContaController::class, 'create']);
    Route::post('/salvar',[ContaController::class, 'store']);
    Route::get('/editar/{id}',[ContaController::class, 'edit']);
    Route::post('/atualizar/{id}',[ContaController::class, 'update']);
    Route::get('/deletar/{id}',[ContaController::class, 'destroy']);
});

Route::prefix('usuario')->group(function (){
    //Route::get('/listar', 'UsuarioController@index');
    Route::post('/novo',[UsuarioController::class, 'create']);
    Route::post('/salvar',[UsuarioController::class, 'store']);
    Route::get('/editar/{id}',[UsuarioController::class, 'edit']);
    Route::post('/atualizar/{id}',[UsuarioController::class, 'update']);
    Route::get('/deletar/{id}',[UsuarioController::class, 'destroy']);
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
