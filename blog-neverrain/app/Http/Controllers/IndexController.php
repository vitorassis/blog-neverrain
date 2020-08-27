<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogo;
use App\Faq;

class IndexController extends Controller
{

    public function index($lang){
        $faq =  Faq::with(['textos'=>function ($q) use ($lang){
            $q->where('lang', $lang);
        }])->orderBy('upvotes', 'DESC')->skip(0)->limit(6)->get();

        return view('welcome', ['jogos'=>Jogo::orderBy('id', 'DESC')->get(), 'faq'=>$faq]);
    }
}
