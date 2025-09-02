<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'home')->name('site.home');
    Route::get('/coletas', 'coletas')->name('site.coletas');
    Route::get('/campanhas', 'campanhas')->name('site.campanhas');
    Route::get('/certificado', 'certificado')->name('site.certificado');
    Route::get('/perfil', 'perfil')->name('site.perfil');
    Route::get('/login', 'login')->name('site.login');
    Route::get('/descarte', 'descarte')->name('site.descarte');
    Route::get('/cadastro', 'cadastro')->name('site.cadastro');
});


Route::resource('produtos', ProdutoController::class);

