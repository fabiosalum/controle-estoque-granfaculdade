<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ProdutosController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para Fornecedores
Route::resource('fornecedores', FornecedoresController::class);
Route::patch('fornecedores/{id}/toggle-status', [FornecedoresController::class, 'toggleStatus'])->name('fornecedores.toggle-status');

// Rotas para Produtos
Route::resource('produtos', ProdutosController::class);
Route::patch('produtos/{id}/toggle-status', [ProdutosController::class, 'toggleStatus'])->name('produtos.toggle-status');
Route::post('produtos/{id}/ajustar-estoque', [ProdutosController::class, 'ajustarEstoque'])->name('produtos.ajustar-estoque');
