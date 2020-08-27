<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table="noticias";
    public $timestamps=false;

    public function midias(){
        return $this->hasMany('App\Midia');
    }

    public function textos(){
        return $this->hasMany('App\Texto');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'tagsdanoticia');
    }

    public function getTextosQtty(){
        return Texto::getQtty($this->id, "noticia");
    }
}
