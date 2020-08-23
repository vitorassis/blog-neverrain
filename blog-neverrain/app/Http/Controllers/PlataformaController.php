<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plataforma;
use Illuminate\Support\Facades\Auth;


class PlataformaController extends Controller
{
    public function indexadmin(){
        return view('admin.platf.index', ['plataformas'=>Plataforma::all()]);
    }

    public function store(Request $request){
        $plataforma = new Plataforma();
        $plataforma->nome = $request->nome;
        $plataforma->link = $request->link;
        $plataforma->save();

        return redirect('/ademiro/plataformas/');
    }

    public function edit($id){
        $plataforma = Plataforma::where('id',$id)->get()->first();

        return view('admin.platf.edit', ['plataforma'=>$plataforma]);
    }

    public function editstore($id, Request $request){
        $plataforma = Plataforma::where('id',$id)->get()->first();

        $plataforma->nome = $request->nome;
        $plataforma->link = $request->link;
        $plataforma->save();

        return redirect('/ademiro/plataformas/edit/'.$id);
    }
    
    public function delete($id){
        if(Auth::check()){
            $plataforma = Plataforma::where('id',$id)->get()->first();

            $plataforma->delete();
        }
        return redirect('/ademiro/plataformas');
    }
}
