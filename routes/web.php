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

//rotas frontend
Route::get('/', 'FrontendController@home')->name('home');
Route::post('/busca', 'TravelController@search')->name('busca');

Auth::routes();

Route::get('/home', 'FrontendController@home')->name('homebackend');

/*--rotas admin---*/
Route::get('/painel', 'HomeController@admin')->name('painel');
//aeroporto
Route::get('/painel/airport', 'AirportController@index')->name('airport');
Route::post('/painel/airport/novo', 'AirportController@create')->name('novoaeroporto');
Route::post('/painel/airport/edita', 'AirportController@update')->name('editaaeroporto');
Route::get('/painel/airport/deleta/{id}', 'AirportController@delet')->name('deletairport');

//Frota aviões
Route::get('/painel/frota', 'AirplaneController@index')->name('frota');
Route::post('/painel/frota/novo', 'AirplaneController@create')->name('novafrota');
Route::post('/painel/frota/edita', 'AirplaneController@update')->name('editafrota');
Route::get('/painel/frota/deleta/{id}', 'AirplaneController@delet')->name('deletfrota');

//voos
Route::get('/painel/voos', 'FlightController@index')->name('voos');
Route::post('/painel/voos/novo', 'FlightController@create')->name('novovoo');
Route::post('/painel/voos/edita', 'FlightController@update')->name('editavoo');
Route::get('/painel/voos/deleta/{id}', 'FlightController@delet')->name('deletvoo');

//viagens
Route::get('/painel/viagens', 'TravelController@index')->name('viagens');
Route::post('/painel/viagens/novo', 'TravelController@create')->name('novaviagem');
Route::post('/painel/viagens/edita', 'TravelController@update')->name('editaviagem');
Route::get('/painel/viagens/deleta/{id}', 'TravelController@delet')->name('deletviagem');

//rotas de compra
Route::post('/carrinho/add', 'AirfaresController@create')->name('criapassagem');
Route::get('/carrinho/all', 'AirfaresController@all')->name('apiAll');
Route::get('/deletacarrinho/{id}', 'AirfaresController@delet')->name('deletacarrinho');
Route::get('/carrinho', 'AirfaresController@fechaCompra')->name('fecharCompra');
Route::post('/pagarcarrinho', 'AirfaresController@pagar')->name('pagar');

//rotas perfil e chekin
Route::get('/perfil', 'AirfaresController@perfil')->name('perfil');
Route::get('/checkin/{id}', 'AirfaresController@checkin')->name('fazercheckin');
Route::post('/checkinout', 'AirfaresController@checkinout')->name('checkinout');
Route::post('/novopassageiro', 'PassengerController@create')->name('novopassageiro');
Route::post('/reclamar', 'AirfaresController@reclamar')->name('reclamar');
