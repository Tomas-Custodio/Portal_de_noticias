<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{
    /**
     * Lista todas as notificações do usuário logado.
     */
    public function index()
    {
        $notificacoes = Auth::user()->notifications()->paginate(20);
        return view('Public.Notificacoes.index', compact('notificacoes'));
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
    public function marcarTodas()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('msg', 'Todas as notificações foram marcadas como lidas.');
    }

    /**
     * (Opcional) Deleta uma notificação.
     */
    public function destroy($id)
    {
        auth()->user()
            ->notifications()
            ->findOrFail($id)
            ->delete();

        return back()->with('msg', 'Notificação removida.');
    }
}