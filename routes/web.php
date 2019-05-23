<?php
;
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

// Route::get('/contacto/{nombre}',function($nombre){
// 	return 'hola soy '.$nombre;

// });

// Route::get('/inicio',function(){
// 	return "hola mundo , laravel";
// }); 
// Route::get('/','Micontrolador@index');
// Route::resource('pokemons','PokemonController');

Route::get('/iniciar','Micontrolador@index');

Route::resource('vistas', 'Micontrolador');

Route::get('vistas/{vista}/pokemons','PokemonController@index');
Route::post('vistas/{vista}/pokemons','PokemonController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


