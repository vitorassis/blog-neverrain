<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Jogo;
use App\Tag;
use App\Texto;
use App\Midia;
use App\TagDaNoticia;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index($lang){
        $noticias = Noticia::with(['midias', 'textos'=> function ($q) use($lang){
            $q->where('lang', $lang);
        }])->orderBy('data_publicacao', "DESC")->paginate(15);

        return view('noticias', ['noticias'=>$noticias, 'jogos'=> Jogo::all()]);
    }

    public function indexadmin(){
        $noticias = Noticia::orderBy('data_publicacao', 'DESC')->get();
        for ($i=0; $i < sizeof($noticias); $i++) { 
            $noticias[$i]->alert = sizeof(config('app.locales')) > $noticias[$i]->getTextosQtty();
        }

        return view('admin.noticias.index', ['noticias'=>$noticias]);
    }

    public function show($lang, $titulo){
        $noticia = Noticia::with(['tags', 'midias', 'textos'=> function($q) use($lang){
            $q->where('lang', $lang);
        }])->whereHas('textos', function ($q) use($lang, $titulo){
            $q->where('tipo', 'titulo')->
                where('texto', $titulo)->where('lang', $lang);
        })->get()->first();
        
        return view('noticia', ['noticia'=>$noticia, 'jogos'=>Jogo::all()]);
    }

    public function store(Request $request){
        $noticia = new Noticia();
        $noticia->data_publicacao = date("Y-m-d");
        $noticia->save();

        foreach(['titulo', 'corpo'] as $tipo){
            foreach(config("app.locales") as $lang){
                $texto = new Texto();
                $texto->noticia_id = $noticia->id;
                $texto->tipo = $tipo;
                $texto->lang = $lang;
                $texto->texto = $request->{$tipo.'_'.$lang};
                $texto->save();    
            }
        }

        $tags = json_decode($request->tags);

        foreach($tags as $tag){
            $tN = new TagDaNoticia();

            $tN->noticia_id = $noticia->id;
            $tN->tag_id = Tag::where('nome', $tag)->get()->first()->id;
            $tN->save();
        }

        $midia = new Midia();

        $midia->noticia_id = $noticia->id;
        $midia->tipo = "head_pic";
        $midia->link = md5(random_int(1, 999999999999999))."head_pic.". explode(".", $request->head_pic->getClientOriginalName())[1];
        $midia->alt = "Capa";
        $request->head_pic->storeAs('', $midia->link);
        $midia->link =  'storage/' . $midia->link;
        $midia->save();

        return redirect('/ademiro/noticias/');

    }

    public function edit($id){
        $noticia = Noticia::findOrFail($id);
        $noticia->load('midias');
        $noticia->load('textos');

        $tags = TagDaNoticia::where('noticia_id', $noticia->id)->get();
        $tg = array();
        foreach($tags as $tag){
            array_push($tg, Tag::find($tag->tag_id)->nome);
        }

        $noticia->tags = json_encode($tg);

        return view('admin.noticias.edit', ['noticia'=>$noticia, 'tags'=>Tag::all(), 'langs'=>config('app.locales')]);

    }

    public function editstore($id, Request $request){
        $noticia = Noticia::findOrFail($id);
        $noticia->save();

        foreach(['titulo', 'corpo'] as $tipo){
            foreach(config("app.locales") as $lang){
                $texto = Texto::where("noticia_id", $noticia->id)->where("tipo", $tipo)->where("lang", $lang)->get()->first();
                $texto->texto = $request->{$tipo.'_'.$lang};
                $texto->save();    
            }
        }


        foreach(TagDaNoticia::where('noticia_id', $noticia->id)->get() as $tag)
            $tag->remove();

        $tags = json_decode($request->tags);

        foreach($tags as $tag){
            $tN = new TagDaNoticia();

            $tN->noticia_id = $noticia->id;
            $tN->tag_id = Tag::where('nome', $tag)->get()->first()->id;
            $tN->save();
        }

        if(isset($request->head_pic)){
            $midia = Midia::where('tipo', 'head_pic')->where('noticia_id', $noticia->id)->get()->first();

            $midia->link = md5(random_int(1, 999999999999999))."head_pic.". explode(".", $request->head_pic->getClientOriginalName())[1];
            $request->head_pic->storeAs('', $midia->link);
            $midia->link =  'storage/' . $midia->link;
            $midia->save();
        }
        return redirect('/ademiro/noticias/');

    }

    public function delete($id){
        if(Auth::check()){
            $noticia = Noticia::findOrFail($id);
            $noticia->delete();
        }

        return redirect('/ademiro/noticias/');
    }

    public function showPerTag($lang, $nome){
        $tag = Tag::where('nome', $nome)->get()->first();

        if($tag == null)
            return redirect("/$lang");
        
        $noticias = Noticia::whereHas('tags', function ($q) use($tag){
            $q->where('id', $tag->id);
        })->with(['tags', 'midias', 'textos'])->orderBy("data_publicacao", "DESC")->paginate(15);

        return view('noticiastag', ['tag'=>$tag, 'noticias'=>$noticias, 'jogos'=>Jogo::all()]);
    }
}
