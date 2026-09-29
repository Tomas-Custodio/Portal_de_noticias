<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;
use App\Models\Categoria;

class Noticia extends Model {

    use HasFactory;

     protected $fillable = [

        "img",
        "data",
        "titulo",
        "resumo",
        "user_id",
        "categoria_id",
        "estado",
        "slug",
        "conteudo"
    ];
    
    public function usuario(){

        return $this->belongsTo( User::class, "user_id");

    }

    public function categoria(){

        return $this->Belongsto(Categoria::class, "categoria_id");
    }

    public function comentarios(){

        return $this->hasMany(Comentario::class,'noticia_id');
    }

    public function likes() {

        return $this->hasMany(Like::class,'noticia_id');
    }
}
