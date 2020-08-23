<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlataformaDisponivel extends Model
{
    protected $table = 'plataformasdisponiveis';
    
    public function remove(){
        DB::delete('delete from plataformasdisponiveis where plataforma_id = ? and jogo_id=?', 
        [$this->plataforma_id, $this->jogo_id]);

        return true;
    }
}
