<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogo;

class PressKitController extends Controller
{
    public function index(){
        $jogos = Jogo::whereHas('midias', function ($q){
            $q->where('tipo', 'press_kit');
        })->with(['midias'=> function($q){
            $q->where('tipo', 'press_kit');
        }])->orderBy('data_lancamento','DESC')->get();
        
        return view('presskit', ['jogos'=>$jogos]);
    }
}
