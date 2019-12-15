<?php

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

Route::get('/', function () {
    return view('welcome');
});

//area administrativa

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function() {
    Route::resource('clients', 'ClientsController');
});

/**
 * as rotas nomeadas servem para vc se referenciar a URI dessa rota pelo nome que vc escolheu
 * a rota abaixo tem uri = user/profile
 * MAS como determinamos um nome para essa uri = profile
 * na aplicação se estivermos em um form poderemos chamar essa rota pelo nome que escolhemos no caso apenas profile
 * É interessante usar name nas rotas pq caso a uri venha mudar não será necessário mudar em todas as views que chamam essa uri
 */
Route::get('user/profile', function () {
})->name('profile');