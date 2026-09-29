<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

Use App\Models\User;
Use App\Models\Noticia;

class Comentario extends Model {

     use HasFactory;

    public function noticia() {

        return $this->belongsTo(Noticia::class,'noticia_id'); 
        
    }

    public function usuario(){

        return $this->belongsto(User::class,'user_id');
    }

    protected $fillable = [
        'user_id',
        'noticia_id',
        'descricao',
    ];
}
