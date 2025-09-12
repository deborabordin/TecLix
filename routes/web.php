<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CertificadoController;

Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'home')->name('site.home');
    Route::get('/coletas', 'coletas')->name('site.coletas');
    Route::get('/campanhas', 'campanhas')->name('site.campanhas');
    Route::get('/perfil', 'perfil')->name('site.perfil');
    Route::get('/login', 'login')->name('site.login');
    Route::get('/descarte', 'descarte')->name('site.descarte');
    Route::get('/cadastro', 'cadastro')->name('site.cadastro');
});


Route::resource('produtos', ProdutoController::class);

// Mostrar o formulário
Route::get('/certificado', [CertificadoController::class, 'mostrar'])->name('certificado.form');

// Enviar o formulário (gera o certificado)
Route::post('/certificado', [CertificadoController::class, 'gerar'])->name('certificado.gerar');

Route::get('/certificado', [CertificadoController::class, 'mostrar'])->name('site.certificado');

