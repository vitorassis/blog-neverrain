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



Auth::routes();

Route::prefix('/admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('jogos')->middleware('auth')->group(function(){
        Route::get('/', 'JogoController@indexadmin');
        Route::get('new', function(){
            return view('admin.jogos.new', ['langs'=>config('app.locales')]);
        });
        Route::post('store', 'JogoController@store');

        Route::prefix('edit')->group(function(){
            Route::get('{id}', 'JogoController@edit');
            Route::post('{id}', 'JogoController@editstore');

            Route::prefix('midia')->group(function(){
                Route::get('{id}', 'JogoController@editmidia');
                Route::post('{id}', 'JogoController@editmidiastore');
            });
        });
        
    });
});
    

Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'IndexController@index');

    Route::prefix('/games')->group(function(){
        Route::get('/', 'JogoController@index');
        Route::get('{jogo:nome}', 'JogoController@view');
    });

    Route::get('about-us', 'SobreNosController@index');



    // Route::prefix('admin')
});