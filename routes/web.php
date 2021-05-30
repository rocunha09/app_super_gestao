<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return 'olá, você está na rota home';
});

Route::get('/sobre-nos', function () {
    return 'olá você está na rota sobre-nos';
});

Route::get('/contato', function () {
    return 'olá, você está na rota contato';
});
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');

//params sempre em sequência
//passagem de parametros com /{param}
//parametro opcional /{param?} *parametros opcionais devem vir por último

//pode-se usar expressões regulares, desta forma a rota só será processada se os params estiverem de acordo com as regras que foram previamente estabelecidas.
//caso houvesse um select, seria recebido: int categoria_id.
//para tratar o valor recebido usa-se o método where após a cláusula get com a expressão regular que vai definir a regra para o parâmetro.
//com as expressões regulares há mais segurança na passagem de parãmetros da aplicação.
Route::get('/contato/{produto}/{categoria_id}', 
function(
    string $produto = 'Desconhecido', 
    int $categoria_id = 1 //caso não receba nenhuma categoria vinda do select, considerar 1 - informação, porém como a expressão regular espera um número, a aplicação quebra err: 404
){
    echo "Estamos aqui, $produto - $categoria_id";
})->where('categoria_id', '[0-9]+')//parâmetro deve ser entre 0 e 9, e apenas numero
  ->where('produto', '[A-Za-z]+'); //parâmetro deve ser entre A-Z e a-z, apenas letra

