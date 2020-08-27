<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table="faq";
    public $timestamps=false;

    public function textos(){
        return $this->hasMany('App\Texto');
    }

    public function getTextosQtty(){
        return Texto::getQtty($this->id, "faq");
    }
}
