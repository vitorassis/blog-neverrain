<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $table = "jogos";

    public function midias(){
        return $this->hasMany('App\Midia');
    }
}
