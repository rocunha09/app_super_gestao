<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function(){return 'login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});    

//rota de fallback
//utilizada quando o usuário tenta acessar uma rota que não existe.

Route::fallback(function(){
    echo 'A rota acessada não existe...<br>';
    echo '<a href="'.route('site.index').'">clique aqui</a> para ir para a página principal'; //neste ponto pode e será implementada uma view mais amigável para o usuário final.
});