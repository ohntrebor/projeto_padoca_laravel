<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CadastroController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', [\App\Http\Controllers\BaseController::class, 'index'])->name('home');
Route::get('/', [\App\Http\Controllers\BaseController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('login');
Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('error');



Route::resource('/cadastro', \App\Http\Controllers\CadastroController::class);

// Todos as rotas incluídas nesse grupo terão o acesso protegido
Route::middleware('autenticacao:logar')->group(function () {

    // Route::get('/', [\App\Http\Controllers\BaseController::class, 'index'])->name('base');

    Route::get('/logoff', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logoff');

    Route::resource('/produtos', \App\Http\Controllers\ProdutoController::class);
    Route::resource('/carrinho', \App\Http\Controllers\CarrinhoController::class);
    Route::post('/carrinho', [\App\Http\Controllers\CarrinhoController::class, 'addToCart'])->name('addToCart');


    Route::delete('/removeToCart/{id}', [\App\Http\Controllers\CarrinhoController::class, 'destroy']);


    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');

    Route::put('/user/edit/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('att');

    Route::put('/carrinho/cupom/{id}', [\App\Http\Controllers\CarrinhoController::class, 'AddCupom'])->name('cupom');

    Route::put('/adm/status/{id}', [\App\Http\Controllers\PedidoController::class, 'attStatusPedidos'])->name('attStatusPedidos');

    Route::post('/fp', [\App\Http\Controllers\PedidoController::class, 'fazerPedido'])->name('fazerPedido');

    Route::delete('/limparCarrinho/{email}', [\App\Http\Controllers\CarrinhoController::class, 'limparCarrinho']);

    Route::get('/adm', [\App\Http\Controllers\PedidoController::class, 'index'])->name('listarPedido');

    Route::fallback(function () {
        echo 'A rota acessada não existe. <a href="' . route('home') . '">clique aqui</a> para ir para página inicial';
    });
});
