<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Use App\Models\Noticia;

class Categoria extends Model
{

    protected $fillable = [

        "nome",
      
    ];


      public function noticias(){

        return $this->hasmany(Noticia::class, "categoria_id");
    }
    
}
