<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    public $timestamps=false;

    public function draw($lang){
        return 
        "<span style='background-color: $this->cor;border-radius:7px;color:$this->cor_letra;cursor:pointer'".
            "onclick=\"window.location.href='/$lang/blog/tag/$this->nome'\">".
                "&nbsp;$this->nome&nbsp;".
        "</span>";
    }
}
