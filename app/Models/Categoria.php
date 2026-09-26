<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [

        "nome",
      
    ];


      public function noticias(){

        return $this->hasmany(Noticia::class, "categoria_id");
    }
    
}
