<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagDaNoticia extends Model
{
    protected $table = 'tagsdanoticia';
    
    public function remove(){
        DB::delete('delete from tagsdanoticia where tag_id = ? and noticia_id=?', 
        [$this->tag_id, $this->noticia_id]);

        return true;
    }
}
