<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jogo;
use App\Tag;
use App\Noticia;
use App\TagDoJogo;
use App\Midia;
use App\Texto;
use App\PlataformaDisponivel;
use App\Plataforma;
use Illuminate\Support\Facades\Auth;


class JogoController extends Controller
{
    public function index($lang){
        $jogos = Jogo::with(['midias' => function($q){
            $q->where('tipo', 'head_pic');
        }, 
        'textos'=>function($q) use($lang){
            $q->where('lang', $lang)->where('tipo', 'descricao_empolg');
        }])->orderBy('data_lancamento', 'DESC')->get();
        
        return view('jogos', ['jogos'=>$jogos]);
    }

    public function indexadmin(){

        $jogos = Jogo::all();
        for ($i=0; $i < sizeof($jogos); $i++) { 
            $jogos[$i]->alert = sizeof(config('app.locales')) > $jogos[$i]->getTextosQtty();
        }

        return view('admin.jogos.index', ['jogos'=>$jogos]);
    }

    public function view($lang, $nome){
        $jogo = Jogo::where('nome', $nome)->with(['midias', 'textos'=>function($q) use ($lang){
            $q->where('lang', $lang);
        }, 'plataformas',
        'tags'])->get()->first();

        $noticias = [];
        if(sizeof($jogo->tags) > 0)
            $noticias = Noticia::whereHas('tags', function ($q) use($jogo){
                foreach($jogo->tags as $tag)
                    $q = $q->orWhere('tag_id', Tag::where('nome', $tag->nome)->get()->first()->nome);
            })->with(['midias', 'textos'])->orderBy("data_publicacao", "DESC")->skip(0)->limit(5)->get();
        
        return view('jogo', ['j_view'=>$jogo, 'jogos'=> Jogo::orderBy('data_lancamento', 'DESC')->get(), 'noticias'=>$noticias]);
    }

    public function store(Request $request){
        
        $this->validate($request, array(
            'nome' =>'required|unique:jogos,nome'
        ));

        $langs = config('app.locales');

        $jogo = new Jogo();
        $jogo->nome = $request->nome;
        $jogo->data_lancamento = $request->data_lancamento;

        $jogo->save();

        $tags = json_decode($request->tags);

        foreach($tags as $tag){
            $tJ = new TagDoJogo();

            $tJ->jogo_id = $jogo->id;
            $tJ->tag_id = Tag::where('nome', $tag)->get()->first()->id;
            $tJ->save();
        }
        
        $plataformas = json_decode($request->plataformas);

        foreach($plataformas as $plataforma){
            $plat = new PlataformaDisponivel();

            $plat->jogo_id = $jogo->id;
            $plat->plataforma_id = Plataforma::where('nome', $plataforma)->get()->first()->id;
            $plat->save();
        }

        foreach(array('titulo_empolg', 'descricao_empolg', 'descricao') as $tipo){
            foreach($langs as $lang){
                $texto = new Texto();

                $texto->jogo_id = $jogo->id;
                $texto->lang = $lang;
                $texto->texto = $request->post($tipo.'_'.$lang);
                $texto->tipo = $tipo;
                $texto->save();
            }
        }

        foreach(array('head_pic', 'empolg_pic', 'press_kit') as $tipo){
            $midia = new Midia();

            $midia->jogo_id = $jogo->id;
            $midia->tipo = $tipo;
            $midia->link = md5(random_int(1, 999999999999999)).$tipo.".". explode(".", $request->$tipo->getClientOriginalName())[1];
            $midia->alt = "Capa";
            $request->$tipo->storeAs('', $midia->link);
            $midia->link =  'storage/' . $midia->link;
            $midia->save();

        }

        foreach($request->carousel_pic as $pic){
            $carousel = new Midia();

            $carousel->jogo_id = $jogo->id;
            $carousel->tipo = "carousel_pic";
            $carousel->link = md5(random_int(1, 999999999999999))."carousel_pic.". explode(".", $pic->getClientOriginalName())[1];
            $carousel->alt = "Carrossel";
            $pic->storeAs('', $carousel->link);
            $carousel->link = 'storage/' . $carousel->link;
            $carousel->save();
        }

        foreach(array('trailer_vid', 'bkgd_vid') as $tipo){
            $link = new Midia();

            $link->jogo_id = $jogo->id;
            $link->tipo = $tipo;
            $link->link = $request->trailer_vid;
            $link->alt = $tipo;
            $link->save();
        }

        foreach(explode("\r\n", $request->links) as $link){
            $lnk = new Midia();
            
            $lnk->jogo_id = $jogo->id;
            $lnk->tipo = "embed_lnk";
            $lnk->link = $link;
            $lnk->alt = "Link";
            $lnk->save();
        }

        return redirect("/ademiro/jogos/");
    }
    
    public function edit($id){
        $jogo = Jogo::findOrFail($id);
        $jogo->load('midias');
        $jogo->load('textos');

        $plats = PlataformaDisponivel::where('jogo_id', $jogo->id)->get();
        $ps = array();
        foreach($plats as $plat){
            array_push($ps, Plataforma::find($plat->plataforma_id)->nome);
        }
        $jogo->plataformas = json_encode($ps);

        $tgs = TagDoJogo::where('jogo_id', $jogo->id)->get();
        $ps = array();
        foreach($tgs as $tag){
            array_push($ps, Tag::find($tag->tag_id)->nome);
        }

        $jogo->tags = json_encode($ps);

        return view('admin.jogos.edit', ['jogo'=>$jogo, 'plataformas'=>Plataforma::all(), 'langs'=>config('app.locales'), 'tags'=>Tag::all()]);
    }

    public function editstore($id, Request $request){
        $this->validate($request, array(
            'nome' =>"required|unique:jogos,nome,$id"
        ));

        $langs = config('app.locales');

        $jogo = Jogo::findOrFail($id);
        $jogo->nome = $request->nome;
        $jogo->data_lancamento = $request->data_lancamento;
        $jogo->save();

        $plataformas = json_decode($request->plataformas);

        foreach(TagDoJogo::where('jogo_id', $jogo->id)->get() as $tag)
            $tag->remove();

        $tags = json_decode($request->tags);

        foreach($tags as $tag){
            $tJ = new TagDoJogo();

            $tJ->jogo_id = $jogo->id;
            $tJ->tag_id = Tag::where('nome', $tag)->get()->first()->id;
            $tJ->save();
        }

        foreach(PlataformaDisponivel::where('jogo_id', $jogo->id)->get() as $plat)
            $plat->remove();

        foreach($plataformas as $plataforma){
            $plat = new PlataformaDisponivel();

            $plat->jogo_id = $jogo->id;
            $plat->plataforma_id = Plataforma::where('nome', $plataforma)->get()->first()->id;
            $plat->save();
        }

        foreach(array('titulo_empolg', 'descricao_empolg', 'descricao') as $tipo){
            foreach($langs as $lang){
                $texto = Texto::where('tipo', $tipo)->where('lang', $lang)->where('jogo_id', $jogo->id)->get()->first();

                $texto->jogo_id = $jogo->id;
                $texto->lang = $lang;
                $texto->texto = $request->{$tipo.'_'.$lang};
                $texto->tipo = $tipo;
                $texto->save();
            }
        }

        return redirect('/ademiro/jogos/edit/'.$id);
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
            
            $head->jogo_id = $id;
            $head->link = md5(random_int(1, 999999999999999))."head_pic.". explode(".", $request->head_pic->getClientOriginalName())[1];
            $request->head_pic->storeAs('', $head->link);
            $head->link =  'storage/' . $head->link;
            $head->save();
        }

        if(isset($request->press_kit)){
            $press = Midia::where('tipo', 'press_kit')->where('jogo_id', $id)->get()->first();
            if($press == null)
                $press = new Midia();

            $press->jogo_id = $id;
            $press->tipo = "press_kit";
            $press->link = md5(random_int(1, 999999999999999))."press_kit.". explode(".", $request->press_kit->getClientOriginalName())[1];
            $request->press_kit->storeAs('', $press->link);
            $press->link =  'storage/' . $press->link;
            $press->alt =  'press_kit';
            $press->save();
        }
        
        if(isset($request->carousel_pic)){
            foreach($request->carousel_pic as $pic){
                $carousel = new Midia();
                $carousel->jogo_id = $id;
                $carousel->tipo = "carousel_pic";
                $carousel->link = md5(random_int(1, 999999999999999))."carousel_pic.". explode(".", $pic->getClientOriginalName())[1];
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
            
            $empolg->jogo_id = $id;
            $empolg->link = md5(random_int(1, 999999999999999))."empolg_pic.". explode(".", $request->empolg_pic->getClientOriginalName())[1];
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

        return redirect('/ademiro/jogos/edit/midia/'.$id);
    }

    public function delete($id){
        if (Auth::check()) {

            $jogo = Jogo::findOrFail($id);

            $jogo->delete();
        }
        return redirect('/ademiro/jogos');
    }
}
