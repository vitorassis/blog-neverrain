<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jogo;
use App\Midia;

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

    public function indexadmin(){
        return view('admin.jogos.index', ['jogos'=>Jogo::all()]);
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

    public function store(Request $request){

        $langs = config('app.locales');

        $jogo = new Jogo();
        $jogo->nome = $request->post("nome");
        
        $titulo_empolgante = array();
        foreach($langs as $lang){
            $titulo_empolgante[$lang] = $request->post("titulo_empolgante_".$lang);
        }
        $jogo->titulo_empolgante = json_encode($titulo_empolgante);
        $descricao_empolgante = array();
        foreach($langs as $lang){
            $descricao_empolgante[$lang] = $request->post("descricao_empolgante_".$lang);
        }
        $jogo->descricao_empolgante = json_encode($descricao_empolgante);

        $descricao = array();
        foreach($langs as $lang){
            $descricao[$lang] = $request->post("descricao_".$lang);
        }
        $jogo->descricao = json_encode($descricao);

        $jogo->save();

        $head = new Midia();
        $head->jogo_id = $jogo->id;
        $head->tipo = "head_pic";
        $head->link = md5(random_int(1, 999999999999999)).".". explode(".", $request->head_pic->getClientOriginalName())[1];
        $head->alt = "Capa";
        $request->head_pic->storeAs('', $head->link);
        $head->link =  'storage/' . $head->link;
        $head->save();

        foreach($request->carousel_pic as $pic){
            $carousel = new Midia();
            $carousel->jogo_id = $jogo->id;
            $carousel->tipo = "carousel_pic";
            $carousel->link = md5(random_int(1, 999999999999999)).".". explode(".", $pic->getClientOriginalName())[1];
            $carousel->alt = "Carrossel";
            $pic->storeAs('', $carousel->link);
            $carousel->link = 'storage/' . $carousel->link;
            $carousel->save();
        }

        $empolg = new Midia();
        $empolg->jogo_id = $jogo->id;
        $empolg->tipo = "empolg_pic";
        $empolg->link = md5(random_int(1, 999999999999999)).".". explode(".", $request->empolg_pic->getClientOriginalName())[1];
        $empolg->alt = "Capa";
        $request->empolg_pic->storeAs('', $empolg->link);
        $empolg->link = 'storage/' . $empolg->link;
        $empolg->save();

        $yt = new Midia();
        $yt->jogo_id = $jogo->id;
        $yt->tipo = "trailer_vid";
        $yt->link = $request->trailer_vid;
        $yt->alt = "Youtube";
        $yt->save();

        $vm = new Midia();
        $vm->jogo_id = $jogo->id;
        $vm->tipo = "bkgd_vid";
        $vm->link = $request->bkgd_vid;
        $vm->alt = "Vimeo";
        $vm->save();

        foreach(explode("\r\n", $request->links) as $link){
            $lnk = new Midia();
            $lnk->jogo_id = $jogo->id;
            $lnk->tipo = "embed_lnk";
            $lnk->link = $link;
            $lnk->alt = "Link";
            $lnk->save();
        }

        return view('admin.jogos');
    }
    
    public function edit($id){
        $jogo = Jogo::findOrFail($id);
        $jogo->load('midias');
        
        return view('admin.jogos.edit', ['jogo'=>$jogo, 'langs'=>config('app.locales')]);
    }

    public function editstore($id, Request $request){
        $langs = config('app.locales');

        $jogo = Jogo::findOrFail($id);
        $jogo->nome = $request->post("nome");
        
        $titulo_empolgante = array();
        foreach($langs as $lang){
            $titulo_empolgante[$lang] = $request->post("titulo_empolgante_".$lang);
        }
        $jogo->titulo_empolgante = json_encode($titulo_empolgante);
        $descricao_empolgante = array();
        foreach($langs as $lang){
            $descricao_empolgante[$lang] = $request->post("descricao_empolgante_".$lang);
        }
        $jogo->descricao_empolgante = json_encode($descricao_empolgante);

        $descricao = array();
        foreach($langs as $lang){
            $descricao[$lang] = $request->post("descricao_".$lang);
        }
        $jogo->descricao = json_encode($descricao);

        $jogo->save();

        return redirect('/admin/jogos/edit/'.$id);
    }

    public function editmidia($id){
        $jogo = Jogo::findOrFail($id);
        $jogo->load('midias');

        $_midias = $jogo->midias;

        $midias = array();
        foreach($_midias as $midia){
            if(!isset($midias[$midia->tipo]))
                $midias[$midia->tipo] = array();
            array_push($midias[$midia->tipo], $midia);
        }

        $jogo->r_midias = $midias;

        return view('admin.jogos.editmidia', ['jogo'=>$jogo]);
    }

    public function editmidiastore($id, Request $request){
        if(isset($request->head_pic)){
            $head = Midia::where('tipo', 'head_pic')->where('jogo_id', $id)->get()->first();
            $head->delete();
            
            $head = new Midia();
            $head->jogo_id = $id;
            $head->tipo = "head_pic";
            $head->link = md5(random_int(1, 999999999999999)).".". explode(".", $request->head_pic->getClientOriginalName())[1];
            $head->alt = "Capa";
            $request->head_pic->storeAs('', $head->link);
            $head->link =  'storage/' . $head->link;
            $head->save();
        }
        
        if(isset($request->carousel_pic)){
            foreach($request->carousel_pic as $pic){
                $carousel = new Midia();
                $carousel->jogo_id = $id;
                $carousel->tipo = "carousel_pic";
                $carousel->link = md5(random_int(1, 999999999999999)).".". explode(".", $pic->getClientOriginalName())[1];
                $carousel->alt = "Carrossel";
                $pic->storeAs('', $carousel->link);
                $carousel->link = 'storage/' . $carousel->link;
                $carousel->save();
            }
        }
        
        if($request->removerCarousel != null){
            foreach(explode(",", $request->removerCarousel) as $rem){
                $carousel = Midia::Find($rem);
                $carousel->delete();
            }
        }

        if(isset($request->empolg_pic)){
            $empolg = Midia::where('tipo', 'empolg_pic')->where('jogo_id', $id)->get()->first();
            $empolg->delete();
            
            $empolg = new Midia();
            $empolg->jogo_id = $id;
            $empolg->tipo = "empolg_pic";
            $empolg->link = md5(random_int(1, 999999999999999)).".". explode(".", $request->empolg_pic->getClientOriginalName())[1];
            $empolg->alt = "Capa";
            $request->empolg_pic->storeAs('', $empolg->link);
            $empolg->link =  'storage/' . $empolg->link;
            $empolg->save();
        }

        $trailer = Midia::where('jogo_id', $id)->where('tipo', 'trailer_vid')->get()->first();
        $trailer->link = $request->trailer_vid;
        $trailer->save();

        $bkgd = Midia::where('jogo_id', $id)->where('tipo', 'bkgd_vid')->get()->first();
        $bkgd->link = $request->bkgd_vid;
        $bkgd->save();

        foreach(explode("\r\n", $request->links) as $_link){
            $count = Midia::where('jogo_id', $id)->where('link', $_link)->get();
            if(sizeof($count) == 0){
                $link = new Midia();
                $link->jogo_id = $id;
                $link->link = $_link;
                $link->tipo = "embed_lnk";
                $link->alt = "link";
                $link->save();
            }
        }
        foreach(Midia::where('jogo_id', $id)->where('tipo', 'embed_lnk')->get() as $_link){
            if(!in_array($_link->link, explode("\r\n", $request->links))){
                $_link->delete();
            }
        }

        return redirect('/admin/jogos/edit/midia/'.$id);
    }

    public function delete($id){
        $jogo = Jogo::findOrFail($id);
        $jogo->load('midias');
        
        foreach($jogo->midias as $midia)
            $midia->delete();

        $jogo->delete();

        return redirect('/admin/jogos');
    }
}
