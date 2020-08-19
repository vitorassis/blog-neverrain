<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogo;

class SobreNosController extends Controller
{
    public function index(){
        return view('sobrenos', ['jogos'=>Jogo::orderBy('id', 'DESC')->get()]);
    }
}
