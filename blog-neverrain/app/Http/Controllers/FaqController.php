<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Texto;

class FaqController extends Controller
{
    public function indexadmin(){
        $faq = Faq::with('textos')->get();
        for ($i=0; $i < sizeof($faq); $i++) { 
            $faq[$i]->alert = sizeof(config('app.locales')) > $faq[$i]->getTextosQtty();
        }
        return view('admin.faq.index', ['questoes'=> $faq]);
    }

    public function store(Request $request){
        $faq = new Faq();
        $faq->upvotes = $request->upvotes;
        $faq->created_at = date('Y-m-d');
        $faq->save();

        foreach(['question', 'answer'] as $tipo){
            foreach(config("app.locales") as $lang){
                $texto = new Texto();
                $texto->faq_id = $faq->id;
                $texto->lang = $lang;
                $texto->tipo = $tipo;
                $texto->texto = $request->{$tipo.'_'.$lang};

                $texto->save();
            }
        }

        return redirect("/ademiro/faq");
    }

    public function edit($id){
        $faq = Faq::with('textos')->where('id', $id)->get()->first();

        return view('admin.faq.edit', ['faq' => $faq, 'langs'=>config('app.locales')]);
    }

    public function editstore($id, Request $request){
        $faq = Faq::findOrFail($id);
        $faq->upvotes = $request->upvotes;
        $faq->created_at = date('Y-m-d');
        $faq->save();

        foreach(['question', 'answer'] as $tipo){
            foreach(config("app.locales") as $lang){
                $texto = Texto::where('faq_id', $faq->id)->where('lang', $lang)->where('tipo', $tipo)->get()->first();
                $texto->faq_id = $faq->id;
                $texto->lang = $lang;
                $texto->tipo = $tipo;
                $texto->texto = $request->{$tipo.'_'.$lang};

                $texto->save();
            }
        }

        return redirect("/ademiro/faq");
    }

    public function delete($id){
        if(Auth::check()){
            $faq = Faq::findOrFail($id);
            $faq->delete();
        }
        return redirect('/ademiro/faq');
    }
}
