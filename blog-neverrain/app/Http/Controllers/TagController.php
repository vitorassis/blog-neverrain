<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function indexadmin(){
        return view('admin.tags.index', ['tags'=>Tag::all()]);
    }

    public function store(Request $request){
        $tag = new tag();
        $tag->nome = $request->nome;
        $tag->cor = $request->cor;
        $tag->save();

        return redirect('/ademiro/tags/');
    }

    public function edit($id){
        $tag = tag::where('id',$id)->get()->first();

        return view('admin.tags.edit', ['tag'=>$tag]);
    }

    public function editstore($id, Request $request){
        $tag = tag::where('id',$id)->get()->first();

        $tag->nome = $request->nome;
        $tag->cor = $request->cor;
        $tag->save();

        return redirect('/ademiro/tags/edit/'.$id);
    }
    
    public function delete($id){
        if(Auth::check()){
            $tag = tag::where('id',$id)->get()->first();

            $tag->delete();
        }
        return redirect('/ademiro/tags');
    }}
