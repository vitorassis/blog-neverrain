<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogo;

class IndexController extends Controller
{

    public function index(){
        return view('welcome', ['jogos'=>Jogo::orderBy('id', 'DESC')->get()]);
    }
}
