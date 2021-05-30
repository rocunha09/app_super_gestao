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

//redirecionamento de rotas
//1 usar metdo redirect;
//2 realizar redirecionamento dentro das funções de callbacks;
//3 realizar redirecionamento dentro dos controllers;

//redirect
/*
Route::get('/rota1', function(){
    echo 'rota 1';
})->name('site.rota1');

//comentar estar rota para testar o redirect
//Route::get('/rota2', function(){
//    echo 'rota 2';
//})->name('site.rota2');


Route::redirect('/rota2', 'rota1');
*/

//redirecionamento dentro das funções de callbacks ou redirecionamento através dos controllers

Route::get('/rota1', function(){
    echo 'rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
   return redirect()->route('site.rota1'); //usa-se o name como parâmetro.
})->name('site.rota2');
