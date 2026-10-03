<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;        
use Illuminate\Support\Facades\Notification;   

use App\Models\User;

class NotificacaoController extends Controller
{
    /**
     * Lista todas as notificações do usuário logado.
     */
    public function index() {

        $notificacoes = Auth::user()->notifications()->paginate(20);
        return view('Public.Notificacoes.index', compact('notificacoes'));
    }
     public function n_notification () {

        $user = User::where('id',Auth::user()->id)->first();
        $naoLidas = $user->UnreadNotifications->count();
        
        return view('Layouts.admin',compact('naoLidas'));
    }

    /**
     * Marca uma notificação como lida e redireciona pro link dela.
     */
    public function marcarLida($id) {
        
        $notificacao = auth()->user()->notifications()->findOrFail($id);
        $notificacao->markAsRead();

        return redirect(route('notificacoes.index'));
    }

    /**
     * Marca TODAS as não lidas como lidas.
     */
    public function marcarTodas() {

        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('msg', 'Todas as notificações foram marcadas como lidas.');
    }

    /**
     * (Opcional) Deleta uma notificação.
     */

    public function destroy($id){

        auth()->user()
            ->notifications()
            ->findOrFail($id)
            ->delete();

        return back()->with('msg', 'Notificação removida.');
    }
}