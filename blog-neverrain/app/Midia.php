<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    protected $table = "midias";
    public $timestamps=false;

    public function owner(){
        if($this->jogo_id != 0)
            return $this->belongsTo('App\Jogo');
        return $this->belongsTo('App\Noticia');
    }
}
