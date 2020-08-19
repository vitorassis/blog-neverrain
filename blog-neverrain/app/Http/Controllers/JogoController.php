<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogo;

class JogoController extends Controller
{
    public function index($lang){
        $jogos = Jogo::with('midias')->orderBy('id', 'DESC')->get();

        for($i = 0; $i < sizeof($jogos); $i++){
            $jogos[$i]->midias = $jogos[$i]->midias->filter(function($value, $key){
                return $value->tipo == "head_pic";
            });
            
            $jogos[$i]->titulo_empolgante = json_decode($jogos[$i]->titulo_empolgante)->$lang;
            $jogos[$i]->descricao_empolgante = json_decode($jogos[$i]->descricao_empolgante)->$lang;
            $jogos[$i]->descricao = json_decode($jogos[$i]->descricao)->$lang;
          
        }
        
         return view('jogos', ['jogos'=>$jogos]);
    }

    public function view($lang, Jogo $jogo){
        $jogo->load('midias');

        $jogo->titulo_empolgante = json_decode($jogo->titulo_empolgante)->$lang;
        $jogo->descricao_empolgante = json_decode($jogo->descricao_empolgante)->$lang;
        $jogo->descricao = json_decode($jogo->descricao)->$lang;

        $_midias = $jogo->midias;

        $midias = array();
        foreach($_midias as $midia){
            if(!isset($midias[$midia->tipo]))
                $midias[$midia->tipo] = array();
            array_push($midias[$midia->tipo], $midia);
        }

        $jogo->r_midias = $midias;

        return view('jogo', ['j_view'=>$jogo, 'jogos'=> Jogo::orderBy('id', 'DESC')->get()]);
    }
}
