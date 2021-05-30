<?php

use Illuminate\Support\Facades\Route;

//rotas com acesso público
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function(){return 'login';})->name('site.login');

//rotas agrupadas dentro de um prefixo para acesso privado.
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});    

//as rotas nomeadas facilitam o uso do helper disponibilizado pelo framework na lógica da apliçaão, como um "apelido".
//desta forma nosso menu de navegação pode ficar assim:

//antes:
//<a href="/">Principal</a>
//depois
//<a href="{{route('site.index')}}">Principal</a>

//o grande benefício é que se a "assinatura" da rota mudar, não temos uma dependência direta gerando alteração em várias partes do código, mas apenas em um ponto.