<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $table = "jogos";

    public function midias(){
        return $this->hasMany('App\Midia');
    }

    public function textos(){
        return $this->hasMany('App\Texto');
    }

    public function plataformas(){
        return $this->belongsToMany('App\Plataforma', 'plataformasdisponiveis');
    }
}
