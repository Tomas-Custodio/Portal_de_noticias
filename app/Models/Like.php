<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use Hasfactory;

    protected $fillable = [
        'user_id',
        'noticia_id',
    ];

    public function noticia() {

        return $this->belongsTo(Noticia::class,'noticia_id');
    }

    public function usuario() {

        return $this->belongsTo(User::class,'user_id');
    }
}
