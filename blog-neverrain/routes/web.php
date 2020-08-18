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

Route::get('/', function(){
    return redirect('/pt');
});

Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'IndexController@index');

    Route::prefix('/games')->group(function(){
        Route::get('/', 'JogoController@index');
        Route::get('{jogo:nome}', 'JogoController@view');
    });
});
