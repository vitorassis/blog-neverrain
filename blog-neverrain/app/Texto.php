<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Texto extends Model
{
    protected $table = "textos";
    public $timestamps=false;

    public function owner(){
        if($this->jogo_id != 0)
            return $this->belongsTo('App\Jogo');
        return $this->belongsTo('App\Noticia');
    }

    public static function getQtty($id, $owner_tipo){
        $qtty = 0;
        $textos = null;

        switch($owner_tipo){
            case "jogo":
                $textos = DB::table('textos')
                                ->select('tipo', DB::raw('count(*) as sub'))
                                ->where('jogo_id', $id)
                                ->groupBy('tipo')->get();
                break;
            case "noticia":
                $textos = DB::table('textos')
                                ->select('tipo', DB::raw('count(*) as sub'))
                                ->where('noticia_id', $id)
                                ->groupBy('tipo')->get();
                break;
            case "faq":
                $textos = DB::table('textos')
                                ->select('tipo', DB::raw('count(*) as sub'))
                                ->where('faq_id', $id)
                                ->groupBy('tipo')->get();
                break;
        }

        foreach($textos as $texto){
            $qtty += $texto->sub;
        }
        
        return intval(floor($qtty/sizeof($textos)));
    }
}
