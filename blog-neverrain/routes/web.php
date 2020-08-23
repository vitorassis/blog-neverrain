<?php

use Illuminate\Support\Facades\Route;
use App\Plataforma;

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

Route::prefix('/ademiro')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('jogos')->middleware('auth')->group(function(){
        Route::get('/', 'JogoController@indexadmin');
        Route::get('new', function(){
            return view('admin.jogos.new', ['langs'=>config('app.locales'), 'plataformas'=>Plataforma::all()]);
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
        
        Route::get('delete/{id}', 'JogoController@delete');
    });

    Route::prefix('plataformas')->middleware('auth')->group(function(){
        Route::get('/', 'PlataformaController@indexadmin');
        Route::get('/new', function(){
            return view('admin.platf.new');
        });
        Route::post('store', 'PlataformaController@store');

        Route::prefix('edit')->group(function(){
            Route::get('{id}', 'PlataformaController@edit');
            Route::post('{id}', 'PlataformaController@editstore');
        });

        Route::get('delete/{id}', 'PlataformaController@delete');
    });
});
    

Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'IndexController@index');

    Route::prefix('/games')->group(function(){
        Route::get('/', 'JogoController@index');
        Route::get('{jogo:nome}', 'JogoController@view');
    });

    Route::get('about-us', 'SobreNosController@index');

    Route::get('/press-kit', 'PressKitController@index');
});