<?php

use Illuminate\Support\Facades\Route;
use App\Plataforma;
use App\Tag;

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
            return view('admin.jogos.new', ['langs'=>config('app.locales'), 'plataformas'=>Plataforma::all(), 'tags'=>Tag::all()]);
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

    Route::prefix('noticias')->middleware('auth')->group(function(){
        Route::get('/', 'BlogController@indexadmin');
        Route::get('/new', function(){
            return view('admin.noticias.new', ['langs'=>config('app.locales'), 'tags'=>Tag::all()]);
        });
        Route::post('/store', 'BlogController@store');

        Route::prefix('edit')->group(function(){
            Route::get('{titulo}', 'BlogController@edit');
            Route::post('{titulo}', 'BlogController@editstore');
        });

        Route::get('delete/{id}', 'BlogController@delete');
    });

    Route::prefix('tags')->middleware('auth')->group(function(){
        Route::get('/', 'TagController@indexadmin');
        Route::get('/new', function(){
            return view('admin.tags.new');
        });
        Route::post('store', 'TagController@store');

        Route::prefix('edit')->group(function(){
            Route::get('{id}', 'TagController@edit');
            Route::post('{id}', 'TagController@editstore');
        });

        Route::get('delete/{id}', 'TagController@delete');
    });

    Route::prefix('faq')->middleware('auth')->group(function(){
        Route::get('/', 'FaqController@indexadmin');
        Route::get('/new', function(){
            return view('admin.faq.new', ['langs'=>config("app.locales")]);
        });
        Route::post('store', 'FaqController@store');

        Route::prefix('edit')->group(function(){
            Route::get('{id}', 'FaqController@edit');
            Route::post('{id}', 'FaqController@editstore');
        });

        Route::get('delete/{id}', 'FaqController@delete');
    });
});
    

Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'IndexController@index');

    Route::prefix('/games')->group(function(){
        Route::get('/', 'JogoController@index');
        Route::get('{jogo:nome}', 'JogoController@view');
    });

    Route::prefix('/blog')->group(function (){
        Route::get('/', 'BlogController@index');
        Route::get('/{id}', 'BlogController@show');

        Route::get('/tag/{nome}', 'BlogController@showPerTag');
    });

    Route::get('about-us', 'SobreNosController@index');

    Route::get('/press-kit', 'PressKitController@index');
});