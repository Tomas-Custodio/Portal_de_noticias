<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Noticia;
use App\Models\Like;

class LikeController extends Controller {
    public function like(Noticia $noticia) {

        $user = Auth::user()->id;

        # vericando se: e esse usuario ja curtiu essa noticia.

        $like = Like::where('user_id', $user->id)->where('noticia_id', $noticia->id)->first();

            if ($like) {

            # se o usuario ja deu like, e  e da um like pela segunda vez , 
            # ele apaga o like anterior,
                $like->delete(); } 
                
            else {

                # se o usuario ainda nao deu like, ele cria o like
                Like::create([
                    'user_id' => $user->id,
                    'noticia_id' => $noticia->id,
                ]);
            }

        return back();
}}
