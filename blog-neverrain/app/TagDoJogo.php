<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagDoJogo extends Model
{
    protected $table = 'tagsdojogo';
    public $timestamps=false;
    
    public function remove(){
        DB::delete('delete from tagsdojogo where tag_id = ? and jogo_id=?', 
        [$this->tag_id, $this->jogo_id]);

        return true;
    }
}
