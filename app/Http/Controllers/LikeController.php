<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use App\Models\Noticia;
use App\Models\Like;
use App\Models\User;
use App\Notifications\Like as LikeNotification;

class LikeController extends Controller {

    public function like(int $noticia_id) {

        $user = User::where('id',Auth::user()->id)->first();
        $noticia = Noticia::findorfail($noticia_id);

        # vericando se: e esse usuario ja curtiu essa noticia.
        
        $like = Like::where('user_id', $user->id)->where('noticia_id', $noticia_id)->first();

            if ($like) {

            # se o usuario ja deu like, e  e da um like pela segunda vez , 
            # ele apaga o like anterior,

                $like->delete(); 
                
            } 
                
            else {

                # se o usuario ainda nao deu like, ele cria o like

                $new_like = Like::create(['user_id' => Auth::user()->id, 'noticia_id' => $noticia_id,]);
                $noticia->usuario->notify( new LikeNotification($noticia,$user) );

            }

        return back();
}}
