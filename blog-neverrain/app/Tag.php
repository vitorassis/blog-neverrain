<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function draw($lang){
        return 
        "<span style='background-color: $this->cor;border-radius:7px'>".
            "<a href='/$lang/blog/tag/$this->nome'>".
                "&nbsp;$this->nome&nbsp;".
            "</a>".
        "</span>";
    }
}
