<?php

use App\Http\Controllers\FornecedorController;

Route::resource('fornecedores', FornecedorController::class);

Route::get('/relatorio/fornecedores', [FornecedorController::class, 'relatorio'])
    ->name('fornecedores.relatorio');

Route::get('/relatorio/fornecedores/pdf', [FornecedorController::class, 'exportarPdf'])
    ->name('fornecedores.pdf');