<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = "textos";

    public function owner(){
        if($this->jogo_id != 0)
            return $this->belongsTo('App\Jogo');
        return $this->belongsTo('App\Noticia');
    }
}
