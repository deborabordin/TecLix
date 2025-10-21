<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PontoDeColetaController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\CampanhaController;
use Illuminate\Support\Facades\Auth;


Route::resource('produtos', ProdutoController::class);
Route::resource('admin/campanhas', CampanhaController::class);

// Mostrar o formulário
Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'home')->name('site.home');
    Route::get('/login', 'login')->name('login');
    Route::get('/campanhas', 'campanhas')->name('site.campanhas');
    Route::get('/campanhas/{campanha}', 'campanhas')->name('site.campanhas-filter');
    Route::get('/cadastro', 'cadastro')->name('site.cadastro');
    Route::get('/coletas', 'coletas')->name('site.coletas');

});



Route::controller(UserController::class)->group(function() {
    Route::post('/cadastro', 'store')->name('user.store');
});



Route::controller(AutenticacaoController::class)->group(function() {
    Route::post('/login', 'login')->name('autenticacao.login');
});



// Rotas que precisam de login
Route::middleware(['auth'])->group(function() {

    Route::controller(SiteController::class)->group(function() {
        Route::get('/perfil', 'perfil')->name('site.perfil');
        Route::get('/descarte', 'descarte')->name('site.descarte');
    });

    Route::middleware(['auth'])->group(function () {
        // Mostrar a view inicial do certificado (opcional)
        Route::get('/certificado', [CertificadoController::class, 'mostrar'])->name('certificado.form');

        // Gerar o certificado automaticamente (com 200+ pontos)
        Route::get('/certificado/gerar', [CertificadoController::class, 'gerar'])->name('certificado.gerar');
    });



    Route::get('/comprovantes', [ComprovanteController::class, 'index'])->name('comprovantes.index');
    Route::get('/comprovantes/criar', [ComprovanteController::class, 'create'])->name('comprovantes.create');
    Route::post('/comprovantes', [ComprovanteController::class, 'store'])->name('comprovantes.store');
    Route::post('/comprovantes/{id}/validar', [ComprovanteController::class, 'validar'])->name('comprovantes.validar');
});


Route::resource('ponto-de-coletas', PontoDeColetaController::class);
Route::post('/ponto-de-coletas/{pontoDeColeta}/add-produto', [PontoDeColetaController::class, 'addProduto'])
    ->name('ponto-de-coletas.addProduto');



use App\Http\Controllers\Admin\ComprovanteAdminController;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');

    Route::get('/comprovantes', [ComprovanteAdminController::class, 'index'])->name('comprovantes.index');
    Route::get('/comprovantes/{comprovante}', [ComprovanteAdminController::class, 'show'])->name('comprovantes.show');
    Route::post('/comprovantes/{comprovante}/aprovar', [ComprovanteAdminController::class, 'aprovar'])->name('comprovantes.aprovar');
    Route::post('/comprovantes/{comprovante}/rejeitar', [ComprovanteAdminController::class, 'rejeitar'])->name('comprovantes.rejeitar');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('site.home');
})->name('logout');
