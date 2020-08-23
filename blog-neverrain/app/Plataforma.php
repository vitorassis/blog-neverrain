<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $table = "plataformas";

    public function jogos(){
        return $this->belongsToMany('App\Jogo', 'plataformasdisponiveis');
    }
}
